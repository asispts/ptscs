# `ptscs`
> PSR-12 coding standard with some strict styles

## Installation
Install with composer
```
composer require --dev asispts/ptscs
```

## Usage
Create `phpcs.xml.dist`
```xml
<?xml version="1.0" encoding="UTF-8"?>
<ruleset>
    <arg name="colors"/>
    <arg name="parallel" value="8"/>
    <arg value="psv"/>
    <arg name="extensions" value="php"/>

  <file>src</file>
  <file>tests</file>

  <exclude-pattern>vendor</exclude-pattern>

  <rule ref="ptscs"/>
</ruleset>
```
Run `phpcs` to validate your source code or `phpcbf` to fix the violations.


## Coding standards

1. Excluded from PSR-12 \
Allow php tag and strict types in the same line.
```php
<?php declare(strict_types=1);
```

2. Require `declare(strict_types=1)` in all PHP files
3. Allow `snake_case` in test methods
```php
public function test_something(): void
{

}
```
4. Detect commented-out code.
5. Ban some built-in functions:
  - `sizeof`, use `count`
  - `print`, use `echo`
  - `each`, use `foreach`
  - `is_null`, use `=== null`
  - `create_function`
  - `var_dump`
  - `print_r`
  - `debug_print_backtrace`
  - `eval`
  - `extract`
6. Brackets are not required when including a file.
```php
// will warn you about this
require_once($file);

// brackets are not required
require_once $file;
```
7. Align multiple statements
```php
$var         = 'value';
$longVarName = 'value';
```
8. Implicit boolean in comparison operator is prohibited.
```php
// prohibited
if ($value1 || !$value2){
}

// allowed
if ($value1 === true || $value2 === false){
}
```
9. Array bracket spacing
```php
$array      ['key'] = 'value';
$array[     'key'] = 'value';
$array['key'       ] = 'value';

// Will be formatted to
$array['key'] = 'value';
$array['key'] = 'value';
$array['key'] = 'value';
```
10. Multiline array identation
```php
function check(): void
{
                return $myArray ===          [
                    'key1'      =>          'value',
                                'key-long-long-long'          =>  'value',
'key-medium'      =>      'value'
                    ];
}

// Will be formatted to
function check(): void
{
    return $myArray === [
      'key1'               => 'value',
      'key-long-long-long' => 'value',
      'key-medium'         => 'value',
    ];
}
```

## License
Released under [MIT License](https://opensource.org/licenses/MIT).
See [LICENSE](https://github.com/asispts/ptscs/blob/master/LICENSE) file.
