# Laravel Share

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jorenvanhocht/laravel-share.svg?style=flat-square)](https://packagist.org/packages/jorenvanhocht/laravel-share)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/jorenvh/laravel-share/master.svg?style=flat-square)](https://travis-ci.org/jorenvh/laravel-share)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/dde6008b-ccc6-4a3f-8a98-37d76532f956.svg?style=flat-square)](https://insight.sensiolabs.com/projects/dde6008b-ccc6-4a3f-8a98-37d76532f956)
[![Total Downloads](https://img.shields.io/packagist/dt/jorenvanhocht/laravel-share.svg?style=flat-square)](https://packagist.org/packages/jorenvanhocht/laravel-share)

Share links exist on almost every page in every project, creating the code for these share links over and over again can be a pain in the ass.
With Laravel Share you can generate these links in just seconds in a way tailored for Laravel.

### Available services

* Facebook
* Twitter
* Linkedin
* WhatsApp
* Reddit
* Telegram

## Installation

You can install the package via composer:

``` bash
composer require jorenvanhocht/laravel-share
```


If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php

```php
// config/app.php
'providers' => [
    ...
    Jorenvh\Share\Providers\ShareServiceProvider::class,
];
```

And optionally add the facade in config/app.php

```php
// config/app.php
'aliases' => [
    ...
    'Share' => Jorenvh\Share\ShareFacade::class,
];
```

Publish the package config & resource files.

```bash
php artisan vendor:publish --provider="Jorenvh\Share\Providers\ShareServiceProvider"
```

> You might need to republish the config file when updating to a newer version of Laravel Share

This will publish the ```laravel-share.php``` config file to your config folder, ```share.js``` in ```public/js/``` and ```laravel-share.php``` in your ```resources/lang/vendor/en/``` folder.

### Fontawesome

Since this package relies on Fontawesome, you will have to require it's css, js & fonts in your app.
You can do that by requesting a embed code [via their website](http://fontawesome.io/get-started/) or by installing it locally in your project.

Laravel share supports Font Awesome v4 and v5, by default v4 is used. You can specify the version you want to use in ```config/laravel-share.php```

### Javascript

Load jquery.min.js & share.js by adding the following lines to your template files.

```html
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="{{ asset('js/share.js') }}"></script>
```

## Usage

### Creating one share link

#### Facebook

``` php
Share::page('http://jorenvanhocht.be')->facebook();
```

#### Twitter

``` php
Share::page('http://jorenvanhocht.be', 'Your share text can be placed here')->twitter();
```

#### Reddit

``` php
Share::page('http://jorenvanhocht.be', 'Your share text can be placed here')->reddit();
```

#### Linkedin

``` php
Share::page('http://jorenvanhocht.be', 'Share title')->linkedin('Extra linkedin summary can be passed here')
```

#### Whatsapp

``` php
Share::page('http://jorenvanhocht.be')->whatsapp()
```

#### Telegram

``` php
Share::page('http://jorenvanhocht.be', 'Your share text can be placed here')->telegram();
```

### Sharing the current url

Instead of manually passing an url, you can opt to use the `currentPage` function.

```php
Share::currentPage()->facebook();
```

### Creating multiple share Links

If want multiple share links for (multiple) providers you can just chain the methods like this.

```php
Share::page('http://jorenvanhocht.be', 'Share title')
	->facebook()
	->twitter()
	->linkedin('Extra linkedin summary can be passed here')
	->whatsapp();
```

This will generate the following html

```html
<div id="social-links">
	<ul>
		<li><a href="https://www.facebook.com/sharer/sharer.php?u=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-facebook-official"></span></a></li>
		<li><a href="https://twitter.com/intent/tweet?text=my share text&amp;url=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-twitter"></span></a></li>
		<li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://jorenvanhocht.be&amp;title=my share text&amp;summary=dit is de linkedin summary" class="social-button " id=""><span class="fa fa-linkedin"></span></a></li>
		<li><a href="https://wa.me/?text=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-whatsapp"></span></a></li>    
	</ul>
</div>
```
### Optional parameters

#### Add extra classes, id's or titles to the social buttons

You can simply add extra class(es), id('s) or title(s) by passing an array as the third parameter on the page method.

```php
Share::page('http://jorenvanhocht.be', null, ['class' => 'my-class', 'id' => 'my-id', 'title' => 'my-title'])
    ->facebook();
```

Which will result in the following html

```html
<div id="social-links">
	<ul>
		<li><a href="https://www.facebook.com/sharer/sharer.php?u=http://jorenvanhocht.be" class="social-button my-class" id="my-id"><span class="fa fa-facebook-official"></span></a></li>
	</ul>
</div>
```

#### Custom wrapping

By default social links will be wrapped in the following html

```html
<div id="social-links">
	<ul>
		<!-- social links will be added here -->
	</ul>
</div>
```

This can be customised by passing the prefix & suffix as a parameter.

```php
Share::page('http://jorenvanhocht.be', null, [], '<ul>', '</ul>')
            ->facebook();
```

This will output the following html.

```html
<ul>
	<li><a href="https://www.facebook.com/sharer/sharer.php?u=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-facebook-official"></span></a></li>
</ul>
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
