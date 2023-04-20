# Complete rules

1. All PSR-12 rules except for `declare(strict_types=1)` should be on the same line as PHP open tag.
2. `declare(strict_types=1)` is required in all PHP files.
3. `snake_case` is allowed in test method names
```php
public function test_something(): void
{
}
```
4. All classes should be declared as either `final` or `abstract`
```php
// Prohibited.
// Should be declared as either final or abstract
class foobar
{
}
```
5. Filenames must match the class names.
6. Detect commented-out code.
```php
// Will warn about the next line
// require_once $file;
```
7. Ban some built-in functions:
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
8. Brackets are not required when including a file.
```php
// will warn you about this
require_once($file);

// brackets are not required
require_once $file;
```
9. Align multiple statements
```php
$var         = 'value';
$longVarName = 'value';
```

10. Array bracket spacing
```php
$array      ['key'] = 'value';
$array[     'key'] = 'value';
$array['key'       ] = 'value';

// Will be formatted to
$array['key'] = 'value';
$array['key'] = 'value';
$array['key'] = 'value';
```

11. Multiline array indentation
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

12. Semi-colon spacing
```php
$var = 'value'      ;

// will be formatted to
$var = 'value';
```

13. Language construct spacing
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

14. Logical operator spacing
```php
$a = $b             && $c;
$a = $b &&              $c;

// will be formatted to
$a = $b && $c;
$a = $b && $c;
```

15. Object operator spacing
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

16. Cast spacing
```php
(int)$var;
(int)       $var;

// will be formatted to
(int) $var;
(int) $var;
```

17. String concatenation spacing
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

18. Echoed strings should not be bracketed
```php
echo('Should not be bracketed');

// will be formatted to
echo 'Should not be bracketed';
```

19. Double quote is used in escaped string only
```php
echo "Double quote is not required here";

// will be formatted to
echo 'Double quote is not required here';
```

20. Remove space before and after function body
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

21. Spacing between functions
```php
function fn1()
{
}

function fn2()
{
}
```

22. Class member spacing
```php
class Foo
{
    private $foo;

    private $bar;
}
```

23. Support fluent interface
```php
$obj->add('value 1')
    ->add('value 2')
    ->add('value 3');
```

24. Disallow long array syntax
```php
$arr = array(); // not allowedgit a
```

25. Forbid final methods in final classes
26. Remove unused `use`
27. Fully qualified global functions
28. Disallow group `use`
29. Disallow multiple `use` per line
30. Disallow `use` from same namespace
31. Detect useless alias
32. Reference used name only (`SlevomatCodingStandard.Namespaces.ReferenceUsedNamesOnly`)
33. Detect useless variable declaration
34. Detect unused variables
35. Detect unused function parameters
36. Detect unused inherited variables passed to a closure
