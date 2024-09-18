# Unofficial Unbounce SDK for PHP

This is a Object Oriented wrapper for the [Unbounce](https://unbounce.com/) API, written with PHP. The full Unbounce API documentation can be found [here](https://developer.unbounce.com/api_reference/).

## Why?

The [Unbounce](https://unbounce.com) team currently has no official SDK. Having an sdk help developers be more productive. 

## Easy use

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