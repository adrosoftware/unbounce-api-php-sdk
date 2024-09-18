<p align="center">
  <img style="padding: 25px" height="50" src="./art/unbounce-plus-php.png">
</p>

<p align="center">
  <a href="https://packagist.org/packages/adrosoftware/unbounce-api-php-sdk">
    <img alt="Latest Stable Version" src="https://img.shields.io/packagist/v/adrosoftware/unbounce-api-php-sdk.svg">
  </a>
  <a href="https://codecov.io/gh/adrosoftware/unbounce-api-php-sdk" > 
    <img src="https://codecov.io/gh/adrosoftware/unbounce-api-php-sdk/branch/main/graph/badge.svg?token=SI4NXOC1AX"/> 
  </a>
  <a href="https://github.com/adrosoftware/unbounce-api-php-sdk/actions/workflows/ci.yml">
    <img alt="Test - CI" src="https://github.com/adrosoftware/unbounce-api-php-sdk/actions/workflows/ci.yml/badge.svg">
  </a>
  <a href="https://github.com/adrosoftware/unbounce-api-php-sdk/blob/main/LICENSE">
    <img alt="License" src="https://img.shields.io/github/license/adrosoftware/unbounce-api-php-sdk">
  </a>
  <img alt="Last commit" src="https://img.shields.io/github/last-commit/adrosoftware/unbounce-api-php-sdk.svg">
</p>

# Unofficial Unbounce SDK for PHP

This is a Object Oriented wrapper for the [Unbounce](https://unbounce.com/) API, written with PHP. The full Unbounce API documentation can be found [here](https://developer.unbounce.com/api_reference/).

## Documentation

To see full documentation visit the oficial [documentation](https://adrosoftware.github.io/unbounce-api-php-sdk/)

## Requirements

* PHP >= 8.1
* A [PSR-17 implementation](https://packagist.org/providers/psr/http-factory-implementation)
* A [PSR-18 implementation](https://packagist.org/providers/psr/http-client-implementation)

## How to use it

_This package is decoupled from any HTTP messaging client with help by [HTTPlug](https://httplug.io). For this reason you need to install a PSR-17 and PSR-18 implementation packages. Example: `composer require symfony/http-client nyholm/psr7`._

Require the package with [composer](https://getcomposer.org/):

```bash
composer require adrosoftware/unbounce-api-php-sdk
```

Create an instance on your codebase as follows and then you will be good to start interacting with the Circle API.

```php
<?php

declare(strict_types=1);

use AdroSoftware\UnbounceSdk\Unbounce;

$unbounce = Unbounce::make('5up3r53cr3770k3n');

// Interact with the API.

$accounts = $unbounce->accounts()->all();
```

## License

This package is licensed under the MIT License - see the [LICENSE](https://github.com/adrosoftware/unbounce-api-php-sdk/blob/main/LICENSE) file for details

## Maintainers

This library is maintained by:
- [Adro Morelos](https://github.com/adrorocker)

## Contributors

See all the contributors [here](https://github.com/adrosoftware/unbounce-api-php-sdk/graphs/contributors)