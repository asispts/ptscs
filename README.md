[![Build](https://github.com/asispts/ptscs/actions/workflows/ci.yml/badge.svg)](https://github.com/asispts/ptscs/actions/workflows/ci.yml)
[![](https://img.shields.io/github/license/asispts/ptscs)](./LICENSE)
[![](https://img.shields.io/packagist/php-v/asispts/ptscs/dev-main)](https://github.com/asispts/ptscs)
[![](https://img.shields.io/packagist/dt/asispts/ptscs)](https://packagist.org/packages/asispts/ptscs)


# `ptscs` (PTS Coding Standard)

`ptscs` is a coding standard for [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) that follows the PSR-12 with additional strict rules. It is intended to help developers maintain consistency and readability in their codebase, and to encourage best practices.

## Installation
You can install with composer
```
composer require --dev asispts/ptscs
```

## Usage
Once installed, you can create a `phpcs.xml.dist` file to define your PHPCS configuration and then configure your text editor or workflow to lint or fix the codebase based on this configuration. Here is an example phpcs.xml.dist file:
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
You can use `phpcs` to validate your source code against this standard or `phpcbf` to automatically fix any violations.

To run `phpcs`, execute the following command:
```
vendor/bin/phpcs
```
To automatically fix any coding standard violations, execute the following command:
```
vendor/bin/phpcbf
```

### Excluding Some Rules
You can exclude some rules by modifying the `phpcs.xml.dist` file. For example, if you want to exclude the rule that requires classes to be declared as either `final` or `abstract` in the `src/Entity` directory of a Symfony project, you can add the following to your `phpcs.xml.dist` file:
```xml
<rule ref="SlevomatCodingStandard.Classes.RequireAbstractOrFinal">
    <exclude-pattern>src/Entity</exclude-pattern>
</rule>
```

This will exclude the `RequireAbstractOrFinal` rule for the `src/Entity` directory. You can customize the rule and the directory as per your needs. By excluding some rules, you can customize the coding standard to better suit your project's requirements.

## Notable coding standard
As mentioned, this coding standard use PSR-12 with some exceptions and additional strict rules. Here are some notable additional strict rules.

1. We exclude some PSR-12 rules to allow `declare(strict_types=1)` on the same line as PHP open tag.
```php
<?php declare(strict_types=1)
```
2.  `declare(strict_types=1)` is required in all PHP files.
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

The complete set of rules can be seen in [RULES.md](./RULES.md) file. These rules are intended to promote cleaner, more readable, and more maintainable code.


## Contributing
We welcome contributions from the community in all forms. You can report issues, suggest improvements or submit pull requests.

For major changes, it is highly recommended to open an issue first to discuss the proposed changes with the project maintainers.

## License
Released under [MIT License](./LICENSE).
