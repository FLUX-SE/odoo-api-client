[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
[![Build Status][ico-github-actions]][link-github-actions]
[![Quality Score][ico-code-quality]][link-code-quality]

## Odoo API client

This library allow communication trough Odoo JSON-RPC or XML-RPC API.
Documentation about it can be found here :
https://www.odoo.com/documentation/master/developer/reference/external_api.html

This library will allow you to :

 * Generate PHP model classes based on the info available into your own Odoo database to ease your calls to the API
 * Send requests to your Odoo instance through the JSON-RPC or the XML-RPC API
 * Make raw requests like [Ripcord](https://github.com/poef/ripcord) was doing it but using newer libs like :
    * `php-http/httplug` to make http requests
    * `symfony/serializer` to handle the JSON/XML-RPC format and to transform resulting array to dedicated object classes.

## Installation

### Composer

Install using Composer :

```shell
composer require flux-se/odoo-api-client php-http/guzzle7-adapter http-interop/http-factory-guzzle
```
> `php-http/guzzle7-adapter` and `http-interop/http-factory-guzzle` are 2 requirements which can be chosen among
> [php-http/client-implementation](https://packagist.org/providers/php-http/client-implementation) and [psr/http-factory-implementation](https://packagist.org/providers/psr/http-factory-implementation)

### Object models generation

**First gather required credential and database info described [here](https://www.odoo.com/documentation/master/developer/reference/external_api.html#connection).**

Depending on your instance the object models available will be different,
that's why this library is allowing you to generate model classes using this cli command :

> This command is using env vars to guess the credentials and database info,
> you can use those env vars to set your credential globally :
> * `ODOO_API_HOST`
> * `ODOO_API_DATABASE`
> * `ODOO_API_USERNAME`
> * `ODOO_API_PASSWORD`

```shell
#> vendor/bin/odoo-model-classes-generator --help
Usage:
  vendor/bin/odoo-model-classes-generator [options] [--] <basePath> <baseNamespace>

Arguments:
  basePath                   The path where classes will be generated (ex: ./src/OdooModel/Object)
  baseNamespace              The base namespace of the generated classes (ex: "App\OdooModel\Object")

Options:
      --host[=HOST]          Your Odoo base host (default: http://localhost:8069) [default: "http://localhost:8069"]
      --database[=DATABASE]  Your Odoo database name (default: odoo-master) [default: "odoo-master"]
      --username[=USERNAME]  Your Odoo account username. (default: admin) [default: "admin"]
      --password[=PASSWORD]  Your Odoo account password or API key (since Odoo v14, default: admin) [default: "admin"]
  -h, --help                 Display help for the given command. When no command is given display help for the vendor/bin/odoo-model-classes-generator command
  -q, --quiet                Do not output any message
  -V, --version              Display this application version
      --ansi                 Force ANSI output
      --no-ansi              Disable ANSI output
  -n, --no-interaction       Do not ask any interactive question
  -v|vv|vvv, --verbose       Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
Example :
  ./vendor/bin/odoo-model-classes-generator \
      --host http://localhost:8069 \
      --database odoo-master \
      --username admin \
      --password admin \
      ./src/OdooModel/Object \
      "App\\OdooModel\\Object"
```

## Introduction

This chapter will describe how the two Odoo APIs are working.

### JSON-RPC

The Odoo JSON-RPC API expose 1 main endpoint `/jsonrpc`.
The body request payload is a JSON object with specific data into it :

```json
{
     "jsonrpc": "2.0",
     "method": 'call',
     "params": {
        {
           "service": 'common',
           "method": 'login',
           "args": [
              'database',
              'username',
              'password'
           ]
        }
     },
     "id": 123456890
 }
```

The service param can be set with those 3 values :

 - `db` allowing to manage the postgres database
 - `common` allowing to authenticate a user or get info about the Odoo installation
 - `object` allowing operations with all API exposed models

This library help you to use those endpoints using `ext-json` and `HttPlug`, **it also allows you to
consume Odoo API using PHP classes representation of all installed Odoo Models**.

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
$password = 'myOdooUserApiKey';

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

```php
$loader = require_once( __DIR__.'/vendor/autoload.php');

use App\Odoo\Model\Object\Res\Partner;
use FluxSE\OdooApiClient\Builder\OdooApiClientBuilder;
use FluxSE\OdooApiClient\Manager\ModelListManager;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperations;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\Criterion;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\SearchDomains;

$host = 'https://myapp.odoo.com';
$database = 'myapp';
$username = 'myemail@mydomain.tld';
$password = 'myOdooUserApiKey';

// 1 - instantiate the Odoo API client builder 
$odooApiClientBuilder = new OdooApiClientBuilder($host);

// 2 - service allowing to query Odoo API using `execute_kw` method
$recordListOperations = $odooApiClientBuilder->buildExecuteKwOperations(
    RecordListOperations::class,
    $database,
    $username,
    $password
);

// 3 - upper service allowing to return classes instead of raw array data
$modelListManager = new ModelListManager(
    $odooApiClientBuilder->buildSerializer(),
    $recordListOperations
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

 * Since Odoo v16 some new fields can produce 500 errors, I try to create issues about them when I get the error, you can found the relates issues here : https://github.com/odoo/odoo/issues?q=is%3Aissue+author%3APrometee+

# Development

## Using docker

```shell
docker run -d -p 5432:5432 -e POSTGRES_USER=odoo -e POSTGRES_PASSWORD=odoo -e POSTGRES_DB=postgres --name db postgres
docker run --rm --pull always -p 8069:8069 --name odoo -e "HOST=host.docker.internal" -t odoo:14 -- --database odoo-master --init "l10n_fr,account_accountant"
```

The server is fully ready to use when this log line appears
(Odoo v13 could take longer than upper version to reach this line) :

```log
2021-01-01 00:00:00,000 1 INFO odoo-master odoo.modules.loading: Modules loaded.
```

Generate the model classes based on the docker Odoo instance :

> This script will use env vars to gather info about (see info [here](#object-models-generation))

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
````

[ico-version]: https://img.shields.io/packagist/v/flux-se/odoo-api-client.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-github-actions]: https://github.com/FLUX-SE/odoo-api-client/workflows/Build/badge.svg
[ico-code-quality]: https://img.shields.io/scrutinizer/g/FLUX-SE/odoo-api-client.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/flux-se/odoo-api-client
[link-github-actions]: https://github.com/FLUX-SE/odoo-api-client/actions?query=workflow%3A"Build"
[link-code-quality]: https://scrutinizer-ci.com/g/FLUX-SE/odoo-api-client
