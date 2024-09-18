## Parameters

The `AdroSoftware\UnbounceSdk\Unbounce::class` client accepts 2 parameters.
* The required API token.
* And an optional `AdroSoftware\UnbounceSdk\Options::class` object. 

## Options

The API client can be customized through the `options` parameter.

The following options can be overridden:

* `response_factory`
* `user_agent`

By default a successful response will return an `array` containing the data returned by the API endpoint. You can create a class that convert that array into an object for example or into a string or even a spacial wrapper object. The created class need to implements the `AdroSoftware\UnbounceSdk\Response\FactoryInterface::class` interface

For this you will override the `response_factory` option like so:

```php
<?php

use AdroSoftware\UnbounceSdk\Unbounce;
use AdroSoftware\UnbounceSdk\Options;
use AdroSoftware\UnbounceSdk\Response\FactoryInterface;
use stdClass;

$factory = new class implements FactoryInterface {
    public function factor(?array $response = null): stdClass
    {
        return (object) $response;
    }
};

$options = new Options([
    'response_factory' => $factory,
]);

$unbounce = new Unbounce({{api_token}}, $options);

/** @var stdClass $accounts */
$accounts = $unbounce->accounts()->all();
```

By default the `user_agent` http header use to make the request to the API endpoint will have the value `adrosoftware/unbounce-api-php-sdk`. You can change this to the value is most convenient for you.

For this you will override the `user_agent` option like so:

```php
<?php

$options = new Options([
    'user_agent' => 'My Awesome App',
]);

$unbounce = new Unbounce({{api_token}}, $options);

/** @var array $accounts */
$accounts = $unbounce->accounts()->all();
```
