# Laravel Share

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jorenvh/laravel-share.svg?style=flat-square)](https://packagist.org/packages/jorenvh/larave-share)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/jorenvh/laravel-share/master.svg?style=flat-square)](https://travis-ci.org/jorenvh/laravel-share)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/dde6008b-ccc6-4a3f-8a98-37d76532f956.svg?style=flat-square)](https://insight.sensiolabs.com/projects/dde6008b-ccc6-4a3f-8a98-37d76532f956)
[![Total Downloads](https://img.shields.io/packagist/dt/jorenvh/laravel-share.svg?style=flat-square)](https://packagist.org/packages/jorenvh/laravel-share)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

``` bash
composer require jorenvh/laravel-share
```

Load the javascript file in your template view.

``` php
<script src="{{ asset('js/share.js') }}"></script>
```

## Usage

``` php
$skeleton = new Jorenvh\Share\Skeleton();
echo $skeleton->echoPhrase('Hello, These Days!');
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email jorenvh@gmail.com instead of using the issue tracker.

## Credits

- [Joren Van Hocht](https://github.com/jorenvh)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
