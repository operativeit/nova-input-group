# Nova Input Group

A Laravel Nova4 text field formatted as input group

[![Latest Version on Packagist](https://img.shields.io/packagist/v/operativeit/nova-input-group.svg?style=flat-square)](https://packagist.org/packages/operativeit/nova-input-group)
[![Total Downloads](https://img.shields.io/packagist/dt/operativeit/nova-input-group.svg?style=flat-square)](https://packagist.org/packages/operativeit/nova-input-group)
![GitHub forks](https://img.shields.io/github/forks/operativeit/nova-input-group)
![GitHub issues](https://img.shields.io/github/issues/operativeit/nova-input-group)
[![License](https://img.shields.io/packagist/l/operativeit/nova-input-group)](https://github.com/operativeit/nova-input-group/blob/master/LICENSE)

![image](https://user-images.githubusercontent.com/188766/211157697-83991d68-f727-4bdb-aa2d-4c5e784007cb.png)

This custom field allow to append or prepend text and/or heroicon icon. Text can also be HTML. 
For HTML, a dedicated component is used intead of *v-html* directive. HTML markup is sanitazed previously sanitized using DOMPurify library to avoid vulnaribility. Note that when you HMTL you can also use Emojis icons.

## Installation

```bash
composer require eom-plus/nova-input-group
```

## Usage

Import it in your resources and add the InputGroup to `fields` method.
We have added various methods to add flexibility to the component. You can append , prepend or both at the same time.

```php
...
use EomPlus\NovaInputGroup\InputGroup;

public function fields(Request $request)
{
    return [
        ID::make('ID', 'id')->sortable(),
        Text::make('Name', 'name'),
        InputGroup::make('Subdomain', 'subdomain')
           ->appendIcon('cube', 'after')
           ->append('<i>@example.com</i>')
           ->prependIcon('cube')
           ->prepend('test')
           ->prependExtraClasses('bg-green-500 text-white')
           ->asHtml()  

    ];
}
...
```


But we have maintained the old method for backward compatibility with [Decency Input Group](https://github.com/decency-be/nova-input-group)

Example using legacy way 

```php
...
use EomPlus\NovaInputGroup\InputGroup;

public function fields(Request $request)
{
    return [
        ID::make('ID', 'id')->sortable(),
        Text::make('Name', 'name'),

        InputGroup::make('Subdomain', 'subdomain')
           ->position('after')
           ->text('@example.com'),

    ];
}
...
```


### Methods


* `prepend(value)` Prepend text to input field
* `prependIcon(name, position)` Prepend heroicon to input field. You can choose between 'before' and 'after'. When not used, 'before' is used.
* `prependExtraClasses(value)` Prepend extra css classes to input field to change background or text color for example.

* `append(value)` Append text to input field
* `appendIcon(name, position)` Append heroicon to input field. You can choose between 'before' and 'after'. When not used, 'before' is used.
* `appendExtraClasses(value)` Append extra css classes to input field to change background or text color for example.

* `asHtml()` render value as HTML

#### Legacy methods for backwards compatibility (avoid to use them)
* `position(text)` You can choose between 'before' and 'after'. When not used, 'before' is used.
* `text(value)` The text to be displayed.

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

### TODO

* Support other kind of field
* Testcases 
* PS4 code compliance
* More examples
* Fix field length
* Add buttons and dropdown support

### Security and contributions.

If you discover any security related issues, please use the issue tracker. All PRs are welcome

## Credits

- [Decency](https://github.com/decency-be)
- [Tim Diels](https://github.com/timdiels1)
- [All Contributors](../../contributors)

## ⭐️ Show Your Support

Please give a ⭐️ if this project helped you!

### Other Packages You Might Like

- [Nova Rating Field](https://github.com/operativeit/nova-rating-field) - A Star rating Nova 4 field to use in your Laravel Nova apps.
- [Nova Feedback Field](https://github.com/operativeit/nova-feedback-field) - An Emoji feedback Nova 4 field to use in your Laravel Nova apps.
- [Nova Input Group](https://github.com/operativeit/nova-input-group) - A Laravel Nova 4 text field formatted as input group
- [Nova Signature](https://github.com/operativeit/nova-signature) - A Laravel Nova 4 signature pad
 
Take a look to our Github repositories as we have a lot of forked nova components with fixes that are still not merge into main owner branch.

## License

The MIT License (MIT). Please see [License File](https://raw.githubusercontent.com/dcasia/nova-welcome-card/master/LICENSE) for more information.
