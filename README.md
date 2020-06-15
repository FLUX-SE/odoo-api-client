[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
[![Build Status][ico-travis]][link-travis]
[![Quality Score][ico-code-quality]][link-code-quality]

## Odoo API client

This library allow communication trough Odoo XMLRPC API.
Documentation about it can be found here :
https://www.odoo.com/documentation/master/webservices/odoo.html

## Installation

Install using Composer :

```
$ composer require flux-se/odoo-api-client
```

## Introduction

The Odoo XMLRPC API expose 3 main endpoints :

 - `/xmlrpc/2/db` allowing to manage the postgres database
 - `/xmlrpc/2/common` allowing to authenticate a user or get info about the Odoo installation
 - `/xmlrpc/2/object` allowing operations with all API exposed models

This library help you to use those endpoints with strict types using `ext-xmlrpc` and `HttPlug`.

The authentication is not standard, your username and your password will be used during a call to
`/xmlrpc/2/common` with the XMLRPC method `authenticate` returning your Odoo user id (`uid`).
This uid, your password and your Odoo database name are needed to make every request calls to the
`/xmlrpc/2/object` endpoint. 

## Usage example

List your first partner (Contact) :

```php
$loader = require_once( __DIR__.'/vendor/autoload.php');

use Flux\OdooApiClient\Api\OdooApiRequestMaker;
use Flux\OdooApiClient\Builder\OdooHttpClientFactory;
use Flux\OdooApiClient\Operations\CommonOperations;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptions;
use Flux\OdooApiClient\Operations\Object\ExecuteKw\RecordListOperations;
use Flux\OdooApiClient\Operations\ObjectOperations;

$host = 'https://myapp.odoo.com';
$database = 'myapp';
$username = 'myemail@mydomain.tld';
$password = 'myOdooPassword';

// 1 - HttPlug configuration
$httpMethodsClientBuilder = new OdooHttpClientFactory($host);
$httpMethodsClient = $httpMethodsClientBuilder->build();

// 2 - Base API consumer handling the de/normalize of the `Request/Response` content body
$odooApi = new OdooApiRequestMaker($httpMethodsClient);

// 3 - The endpoints consumers
// 3.1 - Dedicated "Common" endpoint API consumer used to make the authentication
$commonOperations = new CommonOperations($odooApi);
// 3.2 - Object endpoint operations, only one available : `execute_kw`
$objectOperations = new ObjectOperations(
    $database,
    $username,
    $password,
    $commonOperations
);

// 4 - "Object" endpoint XMLRPC "execute_kw" call with method name like "search*" or "read")
$recordListOperations = new RecordListOperations($objectOperations);

// 4.1 - Helper class to set options to your request
$searchReadOptions = new SearchReadOptions();
$searchReadOptions->setLimit(1);
$searchReadOptions->addField('name');

// @todo add helper for the 2nd argument : $criteria
$partners = $recordListOperations->search_read('res.partner', [[]], $searchReadOptions);

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

[ico-version]: https://img.shields.io/packagist/v/flux-se/odoo-api-client.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/FLUX-SE/odoo-api-client/master.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/FLUX-SE/odoo-api-client.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/flux-se/odoo-api-client
[link-travis]: https://travis-ci.org/FLUX-SE/odoo-api-client
[link-scrutinizer]: https://scrutinizer-ci.com/g/FLUX-SE/odoo-api-client/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/FLUX-SE/odoo-api-client
