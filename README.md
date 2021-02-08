[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
[![Build Status][ico-travis]][link-travis]
[![Quality Score][ico-code-quality]][link-code-quality]

## Odoo API client

This library allow communication trough Odoo XMLRPC API.
Documentation about it can be found here :
https://www.odoo.com/documentation/master/webservices/odoo.html

This library will allows you to :

 * Generate PHP model classes based on the info available into your Odoo database to ease your calls to the API
 * Send requests to your Odoo instance through the XMLRPC API
 * Make raw requests like [Ripcord](https://github.com/poef/ripcord) was doing it but using newer libs like :
    * `php-http` to make http requests
    * `symfony/serializer` to handle the XMLRPC format and to transform resulting array to dedicated object classes.

## Installation

### Composer

Install using Composer :

```shell
composer require flux-se/odoo-api-client php-http/guzzle6-adapter http-interop/http-factory-guzzle
```
> `php-http/guzzle6-adapter` and `http-interop/http-factory-guzzle` are 2 requirements which can be chosen among
> [php-http/client-implementation](https://packagist.org/providers/php-http/client-implementation) and [psr/http-factory-implementation](https://packagist.org/providers/psr/http-factory-implementation)

### Object models generation

Depending on your instance the object models available will be different.
That's why you can generate model classes using this cli command :

```shell
#> vendor/bin/odoo-model-classes-generator --help
Usage:
  ./vendor/bin/odoo-api-client-generator <baseUrl> <database> <username> <password> <basePath> <baseNamespace>

Arguments:
  baseUrl               Your Odoo base URL (ex: https://myinstance.odoo.com.
  database              Your Odoo database name.
  username              Your Odoo account username.
  password              Your Odoo account password
  basePath              The path where classes will be generated (ex: ./src/OdooModel/Object)
  baseNamespace         The base namespace of the generated classes (ex: "App\\OdooModel\\Object")

Example :
  ./vendor/bin/odoo-api-client-generator \
      https://myinstance.odoo.com \
      myinstance-master-1234567 \
      admin \
      admin \
      ./src/OdooModel/Object \
      "App\\OdooModel\\Object"
```

## Introduction

The Odoo XMLRPC API expose 3 main endpoints :

 - `/xmlrpc/2/db` allowing to manage the postgres database
 - `/xmlrpc/2/common` allowing to authenticate a user or get info about the Odoo installation
 - `/xmlrpc/2/object` allowing operations with all API exposed models

This library help you to use those endpoints using `ext-xmlrpc` and `HttPlug`, **it also allows you to
consume Odoo API using PHP classes representation of all installed Odoo Models**.

The authentication is not standard (compare to other APIs), your username and your password will be used during a call to
`/xmlrpc/2/common` with the XMLRPC method `authenticate` returning your Odoo user id (`uid`).
This uid, your password and your Odoo database name are required to make every request calls to the
`/xmlrpc/2/object` endpoint.

## Usage example

Using this library you will be able to use two ways of consuming the Odoo XMLRPC API :

1. using array
2. using object model classes

### Using Array

List your first partner (Contact) :

```php
$loader = require_once( __DIR__.'/vendor/autoload.php');

use Flux\OdooApiClient\Builder\OdooApiClientBuilder;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptions;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperations;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Arguments\Criterion;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Arguments\SearchDomains;

$host = 'https://myapp.odoo.com';
$database = 'myapp';
$username = 'myemail@mydomain.tld';
$password = 'myOdooPassword';

// 1 - instantiate the Odoo API client builder
$odooApiClientBuilder = new OdooApiClientBuilder($host);

// 2 - "Object" endpoint XMLRPC "execute_kw" call with method name like "search*" or "read")
$recordListOperations = $odooApiClientBuilder->buildExecuteKwOperations(
    RecordListOperations::class,
    $database,
    $username,
    $password
);

// 2.1 - Helper class to set parameters to your request
$searchDomains = new SearchDomains();
$searchDomains->addCriterion(Criterion::equal('is_company', true));
// will be translated to : [['is_company', '=', true]]

// 2.2 - Helper class to set options to your request
$searchReadOptions = new SearchReadOptions();
$searchReadOptions->setLimit(1);
$searchReadOptions->addField('name');

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

## Using object model

```php
$loader = require_once( __DIR__.'/vendor/autoload.php');

use Flux\OdooApiClient\Builder\OdooApiClientBuilder;
use Flux\OdooApiClient\Model\Object\Res\Partner;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperations;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Arguments\Criterion;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Arguments\SearchDomains;

$host = 'https://myapp.odoo.com';
$database = 'myapp';
$username = 'myemail@mydomain.tld';
$password = 'myOdooPassword';

// 1 - instantiate the Odoo API client builder
$odooApiClientBuilder = new OdooApiClientBuilder($host);

// 2 - "Object" endpoint XMLRPC "execute_kw" call with method name like "search*" or "read")
$recordListOperations = $odooApiClientBuilder->buildExecuteKwOperations(
    RecordListOperations::class,
    $database,
    $username,
    $password
);

$modelListManager = new ModelListManager(
    $odooApiClientBuilder->buildSerializer(),
    $recordListOperations
);

// 2 - Helper class to set parameters to your request
$searchDomains = new SearchDomains();
$searchDomains->addCriterion(Criterion::equal('is_company', true));
// will be translated to : [['is_company', '=', true]]


$partner = $modelListManager->findOneBy(Partner::class, $searchDomains);

dump($partner);

/**
Flux\OdooApiClient\Model\Object\Res\Partner
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

[ico-version]: https://img.shields.io/packagist/v/flux-se/odoo-api-client.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/FLUX-SE/odoo-api-client/master.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/FLUX-SE/odoo-api-client.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/flux-se/odoo-api-client
[link-travis]: https://travis-ci.org/FLUX-SE/odoo-api-client
[link-scrutinizer]: https://scrutinizer-ci.com/g/FLUX-SE/odoo-api-client/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/FLUX-SE/odoo-api-client
