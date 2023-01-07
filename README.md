# Nova Input Group

[![Latest Version on Packagist](https://img.shields.io/packagist/v/decency/nova-input-group.svg?style=flat-square)](https://packagist.org/packages/decency/nova-input-group)
A Laravel Nova4 text field formatted as input group

This custom field allow to append or prepend text and/or heroicon icon. Text can also be HTML. 
For HTML, a dedicated component is used intead of *v-html* directive. HTML markup is sanitazed using 
HTML is previously sanitized using DOMPurify library to avoid vulnaribility. Note, as HMTL is rendered you can use Emojis icons too

## Installation

```bash
composer require operativeit/nova-input-group
```

## Usage

Import it in your resources and add the InputGroup to `fields` method.
We have added various methods to add flexibility to the component. 


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
* `prependIcon(name, position)` Prepend heroicon to input field
* `prependExtraClasses(value)` Prepend extra css classes to input field to change background or text color for example.

* `append(value)` Append text to input field
* `appendIcon(name, position)` Append heroicon to input field
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

### Security and contributions.

If you discover any security related issues, please use the issue tracker. All PRs are welcome

## Credits

- [Decency](https://github.com/decency-be)
- [Tim Diels](https://github.com/timdiels1)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
