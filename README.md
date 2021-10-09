[![phpunit](https://github.com/danilovl/apply-filter-twig-extension-bundle/actions/workflows/phpunit.yml/badge.svg)](https://github.com/danilovl/apply-filter-twig-extension-bundle/actions/workflows/phpunit.yml)
[![downloads](https://img.shields.io/packagist/dt/danilovl/apply-filter-twig-extension-bundle)](https://packagist.org/packages/danilovl/apply-filter-twig-extension-bundle)
[![latest Stable Version](https://img.shields.io/packagist/v/danilovl/apply-filter-twig-extension-bundle)](https://packagist.org/packages/danilovl/apply-filter-twig-extension-bundle)
[![license](https://img.shields.io/packagist/l/danilovl/apply-filter-twig-extension-bundle)](https://packagist.org/packages/danilovl/apply-filter-twig-extension-bundle)

# ApplyFilterTwigExtensionBundle #

## About ##

Symfony twig extension bundle provides dynamic call filters in template.

### Requirements 

  * PHP 8.0.0 or higher
  * Symfony 5.0 or higher

### 1. Installation

Install `danilovl/apply-filter-twig-extension-bundle` package by Composer:
 
``` bash
$ composer require danilovl/apply-filter-twig-extension-bundle
```
Add the `ApplyFilterTwigExtensionBundle` to your application's bundles if does not add automatically:

``` php
<?php
// config/bundles.php

return [
    // ...
    Danilovl\ApplyFilterTwigExtensionBundle\ApplyFilterTwigExtensionBundle::class => ['all' => true]
];
```

#### 2.0 Usage

Use `apply_filter` function in twig template.

```twig
{{ apply_filter('max', {2: "e", 1: "a", 3: "b", 5: "d", 4: "c"}) }}
```
or 

```twig
{% set filterName = 'upper' %}
{% if isToLower is defined and isToLower %}
    {% set filterName = 'lower' %}
{% endif %}
{{ apply_filter(filterName, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.') }}
```

More exampales in `tests`.

## License

The ApplyFilterTwigExtensionBundle is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).