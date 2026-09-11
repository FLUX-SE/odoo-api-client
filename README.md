[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
[![Build Status][ico-github-actions]][link-github-actions]

# Odoo API client

Odoo (formerly OpenERP) is a Belgian suite of business management software tools (PGI) : https://www.odoo.com/.

This library allows communication through the Odoo JSON-RPC or XML-RPC API.
It also provides an explicit, opt-in JSON-2 path for the supported Odoo 19
object operations. JSON-RPC remains the default; JSON-2 is never selected by
probing or fallback.
Documentation about it can be found here (for the XML-RPC one, none for the JSON-RPC) :
https://www.odoo.com/documentation/master/developer/reference/external_api.html

This library will allow you to :

 * Generate PHP model classes based on the info available into your own Odoo database to ease your calls to the API
 * Send requests to your Odoo instance through the JSON-RPC or the XML-RPC API
 * Send named JSON-2 requests to Odoo 19 through a separate native client or a
   compatibility facade for supported object operations
 * Make raw requests like [Ripcord](https://github.com/poef/ripcord) was doing it but using newer libs like :
    * `php-http/httplug` to make http requests
    * `symfony/serializer` to handle the JSON/XML-RPC format and to transform resulting array to dedicated object classes.

Upgrading an existing JSON-RPC integration? Start with [UPGRADE.md](UPGRADE.md)
for the before/after examples and compatibility checklist.

For JSON-2 setup, supported operations, security guidance and a progressive
migration procedure, see the [Odoo 19 JSON-2 migration guide](docs/json2-migration-guide.md).
The protocol itself is described in the
[official Odoo 19 JSON-2 documentation](https://www.odoo.com/documentation/19.0/developer/reference/external_api.html).

> JSON-2 support does not emulate the historical `common` or `db` services.
> The isolated Odoo 19 Docker suite has passed locally, including accounting
> actions, generated models, restricted access and ephemeral key revocation.
> The existing build runs JSON-2 on its Odoo 19 instances; its first GitHub execution
> still needs confirmation. Support remains experimental, not a production
> certification. See the [review](docs/json2-review.md) and
> [reproducible integration command](docs/json2-integration-testing.md).

## Installation

### Composer

Install using Composer :

```shell
composer require \
  flux-se/odoo-api-client \
  php-http/guzzle7-adapter \
  http-interop/http-factory-guzzle
```
> `php-http/guzzle7-adapter` and `http-interop/http-factory-guzzle` are 2 requirements which can be chosen among
> [php-http/client-implementation](https://packagist.org/providers/php-http/client-implementation) and [psr/http-factory-implementation](https://packagist.org/providers/psr/http-factory-implementation)

### Object models generation

**First gather required credential and database info described [here](https://www.odoo.com/documentation/master/developer/reference/external_api.html#connection).**

Depending on your Odoo instance the object models available will be different,
that's why this library is allowing you to generate model classes using this cli command :

> The historical RPC command reads these environment variables:
> * `ODOO_API_HOST`
> * `ODOO_API_DATABASE`
> * `ODOO_API_USERNAME`
> * `ODOO_API_PASSWORD`
>
> JSON-2 is opt-in with `--api=json2` and reads `ODOO_JSON2_API_KEY` plus the
> optional `ODOO_JSON2_HOST`, `ODOO_JSON2_DATABASE` and
> `ODOO_JSON2_USERNAME`. Inject the key from a secret manager or protected
> process environment; never pass it in argv.

```shell
#> vendor/bin/odoo-model-classes-generator --help
Usage:
  vendor/bin/odoo-model-classes-generator [options] [--] <path> <namespace>

Arguments:
  path                                 The path where classes will be generated
  namespace                            The base namespace of the generated classes

Options:
      --api=API                        "rpc" (default) or "json2" (Odoo 19 opt-in)
      --host[=HOST]                    Odoo base host
      --database[=DATABASE]            Odoo database name
      --username[=USERNAME]            Odoo account username or JSON-2 compatibility label
      --password[=PASSWORD]            RPC credential only; JSON-2 uses ODOO_JSON2_API_KEY
      --only-model[=ONLY-MODEL]        Include only these models (multiple values allowed)
      --exclude-model[=EXCLUDE-MODEL]  Exclude these models (multiple values allowed)
```

RPC remains the default:

```shell
vendor/bin/odoo-model-classes-generator \
    ./src/OdooModel/Object \
    "App\\OdooModel\\Object"
```

For Odoo 19 JSON-2, after securely injecting `ODOO_JSON2_API_KEY`:

```shell
vendor/bin/odoo-model-classes-generator \
    --api=json2 \
    --host=https://myapp.odoo.com \
    --database=myapp \
    ./src/OdooModel/Object \
    "App\\OdooModel\\Object"
```

## Introduction

This chapter will describe how the two Odoo APIs are working.

<details>
  <summary>JSON-RPC (Click me to see detailed info)</summary>

### JSON-RPC

The Odoo JSON-RPC API expose 1 main endpoint `/jsonrpc`.
The body request payload is a JSON object with specific data into it :

```json
{
     "jsonrpc": "2.0",
     "method": "call",
     "params": [
        {
           "service": "common",
           "method": "login",
           "args": [
              "database",
              "username",
              "password"
           ]
        }
     ],
     "id": 123456890
 }
```

The service param can be set with those 3 values :

 - `db` allowing to manage the postgres database
 - `common` allowing to authenticate a user or get info about the Odoo installation
 - `object` allowing operations with all API exposed models

This library help you to use those endpoints using `ext-json` and `HttPlug`, **it also allows you to
consume Odoo API using PHP classes representation of all installed Odoo Models**.

</details>

<details>
  <summary>XML-RPC (Click me to see detailed info)</summary>

### XML-RPC

The Odoo XML-RPC API expose 3 main endpoints :

 - `/xmlrpc/2/db` allowing to manage the postgres database
 - `/xmlrpc/2/common` allowing to authenticate a user or get info about the Odoo installation
 - `/xmlrpc/2/object` allowing operations with all API exposed models

This library help you to use those endpoints using `ext-xmlrpc` and `HttPlug`, **it also allows you to
consume Odoo API using PHP classes representation of all installed Odoo Models**.

The authentication is not standard (compare to other APIs), your username and your password will be used during a call to
`/xmlrpc/2/common` with the XML-RPC method `authenticate` (or `login`) returning your Odoo user id (`uid`).
This uid, your password and your Odoo database name are required to make every request calls to the
`/xmlrpc/2/object` endpoint.

</details>

## Usage example

Using this library you will be able to use two ways of consuming the Odoo XML-RPC API :

1. using array
2. using object model classes

### Using Array

List your first partner (Contact) :

```php
$loader = require_once( __DIR__.'/vendor/autoload.php');

use FluxSE\OdooApiClient\Builder\OdooApiClientBuilder;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptions;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperations;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\Criterion;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\SearchDomains;

$host = 'https://myapp.odoo.com';
$database = 'myapp';
$username = 'myemail@mydomain.tld';
$password = getenv('ODOO_API_PASSWORD');
if (!is_string($password) || '' === $password) {
    throw new RuntimeException('ODOO_API_PASSWORD is required.');
}

// 1 - instantiate the Odoo API client builder
$odooApiClientBuilder = new OdooApiClientBuilder($host);

// 2 - service allowing to query Odoo API using `execute_kw` method
$recordListOperations = $odooApiClientBuilder->buildExecuteKwOperations(
    RecordListOperations::class,
    $database,
    $username,
    $password
);

// 3.1 - Helper class to set parameters to your request
$searchDomains = new SearchDomains();
$searchDomains->addCriterion(Criterion::equal('is_company', true));
// will be translated to : [['is_company', '=', true]]

// 3.2 - Helper class to set options to your request
$searchReadOptions = new SearchReadOptions();
$searchReadOptions->setLimit(1);
$searchReadOptions->addField('name');

// 3.3 - Search for the first Partner being a company and only return its name 
$partners = $recordListOperations->search_read('res.partner', $searchDomains, $searchReadOptions);

dump($partners);

/**

array:1 [
  0 => array:2 [
    "id" => 1
    "name" => "My Partner"
  ]
]

**/
```

> By default, the **JSON-RPC** API will be used, if you want to use XML-RPC
> create an Odoo Api Client builder like this :
> 
> ```php
> use FluxSE\OdooApiClient\Api\OdooApiRequestMakerInterface;
> use FluxSE\OdooApiClient\Builder\OdooApiClientBuilder;
> 
> $odooApiClientBuilder = new OdooApiClientBuilder(
>   $host,
>   OdooApiRequestMakerInterface::BASE_XMLRPC_PATH
> );
> ```

## Using object model

First you can generate classes based on the Odoo instance you have, for example:

```shell
bin/odoo-model-classes-generator \
      "./src/Odoo/Model/Object" \
      "App\\Odoo\\Model\\Object" \
      --only-model=res.partner
```

> 💡 Here we are generating only one class, but you can also generate all classes excluding some of them (see info [here](#object-models-generation)).

```php
$loader = require_once( __DIR__.'/vendor/autoload.php');

use App\Odoo\Model\Object\Res\Partner;
use FluxSE\OdooApiClient\Builder\OdooApiClientBuilder;
use FluxSE\OdooApiClient\Manager\ModelListManager;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperations;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\Criterion;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\SearchDomains;
use FluxSE\OdooApiClient\Provider\ModelFieldsProvider;

$host = 'https://myapp.odoo.com';
$database = 'myapp';
$username = 'myemail@mydomain.tld';
$password = getenv('ODOO_API_PASSWORD');
if (!is_string($password) || '' === $password) {
    throw new RuntimeException('ODOO_API_PASSWORD is required.');
}

// 1 - Instantiate the Odoo API client builder 
$odooApiClientBuilder = new OdooApiClientBuilder($host);

// 2 - Service allowing to query Odoo API using `execute_kw` method
$recordListOperations = $odooApiClientBuilder->buildExecuteKwOperations(
    RecordListOperations::class,
    $database,
    $username,
    $password
);

// 3 - Service allowing to return object instead of raw array data
$modelListManager = new ModelListManager(
    $odooApiClientBuilder->buildSerializer(),
    $recordListOperations,
    new ModelFieldsProvider()
);

// 4.1- Helper class to set parameters to your request
$searchDomains = new SearchDomains();
$searchDomains->addCriterion(Criterion::equal('is_company', true));
// will be translated to : [['is_company', '=', true]]

// 4.2 - Search for the first Partner being a company 
$partner = $modelListManager->findOneBy(Partner::class, $searchDomains);

dump($partner);

/**
App\Odoo\Model\Object\Res\Partner
{#1234
  #name: "My test company"
  #date: DateTimeImmutable @1577880060 {#1234
    date: 2020-01-01 12:01:00.123456 UTC (+00:00)
  }
  #is_company: true

  ...
  
  #id: 1
  #display_name: "My test company"
  #__last_update: DateTimeImmutable @1577923260 {#5678
    date: 2020-01-02 00:01:00.123456 UTC (+00:00)
  }
}
**/
```

# Know issues

 * Since Odoo v16 some new fields can produce 500 errors, I try to create issues about them when I get the error,
   you can found the relates issues here : https://github.com/odoo/odoo/issues?q=is%3Aissue+author%3APrometee+

# Development

## Using docker

```shell
docker run -d -p 5432:5432 -e POSTGRES_USER=odoo -e POSTGRES_PASSWORD=odoo -e POSTGRES_DB=postgres --name db postgres
docker run --rm --pull always -p 8069:8069 --name odoo -e "HOST=host.docker.internal" -t odoo:14 -- --database odoo-master --init "l10n_fr,account_accountant"
```

The server is fully ready to use when this log line appears
(Odoo v13 could take longer than upper version to reach this line) :

```log
2030-01-01 00:00:00,000 1 INFO odoo-master odoo.modules.loading: Modules loaded.
```

Generate the model classes based on the docker Odoo instance :

> This script will use env vars to gather info about the Odoo instance you are targeting (see info [here](#object-models-generation)).

```shell
bin/odoo-model-classes-generator \
      "./tests/TestModel/Object" \
      "Tests\\FluxSE\\OdooApiClient\\TestModel\\Object"
```

Test the code against the generated classes from your own Odoo instance

```shell
vendor/bin/ecs check tests
vendor/bin/psalm
vendor/bin/phpunit
```

[ico-version]: https://img.shields.io/packagist/v/flux-se/odoo-api-client.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-github-actions]: https://github.com/FLUX-SE/odoo-api-client/workflows/Build/badge.svg

[link-packagist]: https://packagist.org/packages/flux-se/odoo-api-client
[link-github-actions]: https://github.com/FLUX-SE/odoo-api-client/actions?query=workflow%3A"Build"
