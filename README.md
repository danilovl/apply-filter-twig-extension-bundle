# ApplyFilterTwigExtensionBundle #

## About ##

Symfony twig extension bundle provides dynamic call filters in template.

### Requirements 

  * PHP 7.4.0 or higher
  * Symfony 5.0 or higher

### 1. Installation

Install `danilovl/apply-filter-twig-extension-bundle` package by Composer:
 
``` bash
$ composer require danilovl/object-to-array-transform-bundle
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