# ExaVault PHP API Library (Guzzle Compatibility Edition) - v2 API

## Introduction
Welcome to ExaVault's PHP code library for our v2 API. Our v2 API will allow you to interact with all aspects of the service the same way our web portal would. The library is generated from our API's [public swagger YAML file](https://www.exavault.com/api/docs/evapi_2.0_public.yaml).

## Important Note About Guzzle
This library should be used when your project requires a different version of [guzzle](https://github.com/guzzle/guzzle) than version 6. We have updated references to the Guzzle library to use version 6.5.5, which has been included in the vendor-static subdirectory. If your project does not require a different version of Guzzle, use [our normal PHP library](https://github.com/exavault/evapi-php) instead.

## Requirements

To use this library, you'll need PHP 5.5 (or greater) installed as well as [composer](https://getcomposer.org). 

You will also need an ExaVault account, as well as an API key and access token.

## Installing the Code Library

### Option 1 - Using Composer
You can use composer to add this library to your project by running this command in your project folder:

```bash
% composer require exavault/evapi-php-guzzle-compat 
```

### Option 2 - Manual Installation
Alternatively, you can clone the [github repo](https://github.com/ExaVault/evapi-php-guzzle-compat) and then run `composer install` in the evapi-php-guzzle-compat directory to install dependencies.

## Sample Code

For a gentle introduction to using PHP code with ExaVault's API, check out [our code samples](https://github.com/ExaVault/evapi-php-samples). Follow the instructions in that repository's README to run the sample scripts, which will demonstrate how to use several of the generated PHP classes to interact with your ExaVault account.

## Writing Your Own Code

When you're ready to write your own code using this library, you'll need to:

1. Install our code library in your project, either with `composer require exavault/evapi-php-guzzle-compat` or by downloading this repository and running `composer install`
1. Include the generated `vendor/autoload.php` to the top of your script
1. Provide your API key and access token with every function method on the Api classes, which are in the ExaVault\Api namespace.
1. Whenever you instantiate an Api object (ResourcesApi, UsersApi, etc.), override the configuration to point the code at the correct API URL:
```php
// Replace YOUR_ACCOUNT_NAME_HERE with your account name!
$account_url = "https://YOUR_ACCOUNT_NAME_HERE.exavault.com/api/v2/";
$accountApi = new ExaVault\Api\AccountApi(
    null,
    (new ExaVault\Configuration())->setHost($account_url)
);
```
```php
$resourcesApi = new ExaVault\Api\ResourcesApi(
    null,
    (new ExaVault\Configuration())->setHost($account_url)
);
```
```php
$usersApi = new ExaVault\Api\UsersApi(
    null,
    (new ExaVault\Configuration())->setHost($account_url)
);
```

If you'd like to see this done in sample code, please take a look at [our code samples](https://github.com/ExaVault/evapi-php-samples).

## Author

support@exavault.com

