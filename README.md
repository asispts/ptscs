[![](https://img.shields.io/github/license/asispts/ptscs)](./LICENSE)
[![](https://img.shields.io/packagist/php-v/asispts/ptscs/dev-main)](https://github.com/asispts/ptscs)
[![](https://img.shields.io/packagist/dt/asispts/ptscs)](https://packagist.org/packages/asispts/ptscs)


# `ptscs`
> PSR-12 coding standard with some additional strict rules

## Installation
Install with composer
```
composer require --dev asispts/ptscs
```

## Usage
Create `phpcs.xml.dist`
```xml
<?xml version="1.0" encoding="UTF-8"?>
<ruleset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
  xsi:noNamespaceSchemaLocation="vendor/squizlabs/php_codesniffer/phpcs.xsd">

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
```php
// Will warn about the next line
// require_once $file;
```
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
10. Multiline array indentation
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
11. Semi-colon spacing
```php
$var = 'value'      ;

// will be formatted to
$var = 'value';
```
12. Language construct spacing
```php
// For example
require$blah;
require_once        'test';
$a = new        stdClass();

// will be formatted to
require $blah;
require_once 'test';
$a = new stdClass();
```
13. Logical operator spacing
```php
$a = $b             && $c;
$a = $b &&              $c;

// will be formatted to
$a = $b && $c;
$a = $b && $c;
```
14. Object operator spacing
```php
$this   ->testThis();
$this->     testThis();

parent      ::testThis();
parent::    testThis();

// will be formatted to
$this->testThis();
$this->testThis();

parent::testThis();
parent::testThis();
```
15. Cast spacing
```php
(int)$var;
(int)       $var;

// will be formatted to
(int) $var;
(int) $var;
```

16. String concatenation spacing
```php
$var = 'Hello' .     ' World';
$var = 'Hello'      . ' World';
$var = 'Hello'      .
' World';

// will be formatted to
$var = 'Hello' . ' World';
$var = 'Hello' . ' World';
$var = 'Hello' . ' World';
```

17. Echoed strings should not be bracketed
```php
echo('Should not be bracketed');

// will be formatted to
echo 'Should not be bracketed';
```

18. Double quote is used in escaped string only
```php
echo "Double quote is not required here";

// will be formatted to
echo 'Double quote is not required here';
```

19. Remove space before and after function body
```php
function fn()
{

  $var = 1;

}

// will be formatted to
function fn()
{
  $var = 1;
}
```
20. Spacing between functions
```php
function fn1()
{
}

function fn2()
{
}
```
21. Class member spacing
```php
class Foo
{
    private $foo;

    private $bar;
}
```
22. Support fluent interface
```php
$obj->add('value 1')
    ->add('value 2')
    ->add('value 3');
```
23. Ensure filename have to match the class name
24. Forbid final methods in final classes
25. Disallow long array syntax
```php
$arr = array(); // not allowedgit a
```
26. All classes should be a `final` or `abstract`
27. Remove unused `use`
28. Fully qualified exceptions and global functions
29. Disallow group `use`
30. Disallow multiple `use` per line
31. Disallow `use` from same namespace
32. Detect useless alias

## License
Released under [MIT License](https://opensource.org/licenses/MIT).
See [LICENSE](./LICENSE) file.
