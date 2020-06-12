[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
[![Build Status][ico-travis]][link-travis]
[![Quality Score][ico-code-quality]][link-code-quality]

## Odoo API client

This library allow communication trough Odoo API client.

## Installation

Install using Composer :

```
$ composer require flux/odoo-api-client
```

## Usage

```php
$loader = require_once( __DIR__.'/vendor/autoload.php');

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

$classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));

$metadataAwareNameConverter = new MetadataAwareNameConverter($classMetadataFactory);

$serializer = new Serializer(
    [new ObjectNormalizer($classMetadataFactory, $metadataAwareNameConverter)],
    ['json' => new JsonEncoder()]
);
```

[ico-version]: https://img.shields.io/packagist/v/Flux/odoo-api-client.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/Flux/OdooAPIClient/master.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/Flux/OdooAPIClient.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/flux/odoo-api-client
[link-travis]: https://travis-ci.org/Flux/OdooAPIClient
[link-scrutinizer]: https://scrutinizer-ci.com/g/Flux/OdooAPIClient/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/Flux/OdooAPIClient
