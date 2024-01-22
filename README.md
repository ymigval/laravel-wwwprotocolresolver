# Laravel WWW Protocol Resolver

The "laravel-wwwprotocolresolver" package provides easy configuration for redirecting responses with or without "www" and with the specified protocol (http or https) in Laravel applications. You can customize the redirection type (permanent or temporary), scheme (http or https), and redirection mode (with or without "www") according to your needs.


## Installation

To install the package, run the following command in your Laravel project's terminal:


```bash
composer require ymigval/laravel-wwwprotocolresolver
```

## Publish configuration file (optional)

If you want to customize the package configuration, you can publish the configuration file using the following command:

```bash
php artisan vendor:publish --tag="wwwprotocolresolver"
```

## Usage

To use the package, simply add the following environment variables to your .env file:

```dotenv
WWW_PROTOCOL_RESOLVER_USE=https
WWW_PROTOCOL_RESOLVER_MODE=with_www
```
Ensure that you set these configurations only in production environments to avoid unwanted redirections during development.



### Configuration

You can adjust the package configuration in the `config/wwwprotocolresolver.php` file. Here, you can define the redirection type (301 or 302), scheme (http or https), and redirection mode (with or without "www") according to your preferences.


```php
return [
    'type' => env('WWW_PROTOCOL_RESOLVER_TYPE', 301),
    'use' => env('WWW_PROTOCOL_RESOLVER_USE'),
    'mode' => env('WWW_PROTOCOL_RESOLVER_MODE'),
];
```

This package allows you to enhance the security and consistency of your URLs by ensuring that all users are redirected to the preferred version of your website.


## Changelog
Please refer to the [CHANGELOG](CHANGELOG.md) for more information about recent changes.


## License
The MIT License (MIT). For more information, please see the [License File](LICENSE).
