?> For more details on the data returned by the endpoints visit the [official documentation](https://developer.unbounce.com/api_reference/)

!> For details on the values accepted for each parameter please visit the [official documentation](https://developer.unbounce.com/api_reference/)

## Accounts

The __Accounts__ collection is the entry point to the rest of the Unbounce API. Your API key will give you access to all of the clients owned by your primary account.

### get()

Returns an array with the accounts collection.

```php
$accounts = $unbounce->accounts()->get();
```

### find()

Returns an array with the account details.

```php
$account = $unbounce->accounts()->find(1);
```

## Pages

Access all __Pages__ for the authenticated principal. An authenticated principal is either an API Key, or an OAuth client. We provide this top-level resource specifically for OAuth clients. Any Unbounce customer can be invited to author or view a page on a different client than their own. The legacy Pages resource we provide doesn't allow for accessing these external pages. This top-level resource allows you to additionally filter pages based on the specified role.

### get()

Retrieve a list of all pages.

```php
$pages = $unbounce->pages()->get(
    sortOrder: 'asc', // or 'desc'. Optional
    onlyCount: false, // or true. Optional
    from: new DateTime('2022-01-01'), // or '2022-01-01'. Optional
    to: new DateTime('2022-01-31'), // or '2022-01-31'. Optional
    offset: 0, // Optional
    limit: 10, // Optional
    withStats: false, // or true. Optional
    role: 'author', // or 'viewer'. Optional
);
```

### find()

Retrieve a single page.

```php
$page = $unbounce->pages()->find(1);
```