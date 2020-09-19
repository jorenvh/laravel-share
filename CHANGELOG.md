# Changelog

All Notable changes to `laravel-share` will be documented in this file

## 1.0.0 - 2016-11-20

- initial release

## 1.0.1 - 2016-11-27

- Add currentPage method
- Apply some cleanups

## 1.0.2 - 2017-06-30
- Fix publish path for translation files

## 1.0.3 - 2017-08-30
- Add support for Laravel 5.5 Package Auto-Discovery

## 1.0.4 - 2017-09-28
- Bug fix for Laravel 5.5 Package Auto-Discovery, this fixes issue #9

## 2.0 - 2018-01-20
- Add support for Font Awesome 5, next to Font Awesome 4. PR #16

## 2.0.1 - 2018-05-18
- Urlencode optional title & message parameters (Fixes issue #23)

## 2.0.2 - 2018-05-18
- Adapt tests to changed responses with urlencoded title & message parameters

## 2.0.3 - 2018-12-29
- Add Whatsapp share provider

## 2.0.4 - 2019-05-19
- Add Pinterest share provider

## 3.0.0 - 2019-08-28
- Remove Google Plus share provider

## 3.1.0 - 2019-09-06
- Add Redit share provider
- Add Telegram share provider

## 3.2.0 - 2019-12-30
- Add support for the title attribute. (credit to Bogdan Cismariu)

## 3.3.0 - 2020-09-11
- Add `getRawLinks` method to only return the raw links

## 3.3.1 - 2020-09-19
- use `Arr::first` instead of `array_first` helper
