<div align="center">
  <samp>
    <h1>ptscs</h1>
    <h3>&raquo; PSR-12 coding standard with stricter rules &laquo;</h3>
  </samp>
  &nbsp;
</div>

[![CI](https://github.com/asispts/ptscs/actions/workflows/ci.yml/badge.svg)](https://github.com/asispts/ptscs/actions/workflows/ci.yml)
[![License](https://img.shields.io/github/license/asispts/ptscs)](./LICENSE)
[![PHP Version](https://img.shields.io/packagist/php-v/asispts/ptscs/dev-main)](https://github.com/asispts/ptscs)
[![Stable Version](https://img.shields.io/packagist/v/asispts/ptscs?label=stable)](https://packagist.org/packages/asispts/ptscs)
[![Downloads](https://img.shields.io/packagist/dt/asispts/ptscs)](https://packagist.org/packages/asispts/ptscs)
<p>&nbsp;</p>

`ptscs` is a [PHP_CodeSniffer](https://github.com/PHPCSStandards/PHP_CodeSniffer) ruleset based on **PSR-12** with stricter rules for consistency, readability, and best practices.
<p>&nbsp;</p>

## Installation
```bash
composer require --dev asispts/ptscs
```
<p>&nbsp;</p>


## Usage

Create a `phpcs.xml.dist` file in your project root with the following configuration (customize as needed for your project structure):

```xml
<?xml version="1.0" encoding="UTF-8"?>
<ruleset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
  xsi:noNamespaceSchemaLocation="vendor/squizlabs/php_codesniffer/phpcs.xsd">

  <arg name="colors" />
  <arg name="parallel" value="8" />
  <arg value="psv" />
  <arg name="extensions" value="php" />

  <file>src</file>
  <file>tests</file>

  <exclude-pattern>vendor</exclude-pattern>

  <rule ref="ptscs" />

  <!-- Example: exclude a rule -->
  <!-- (e.g. disable abstract/final requirement in symfony entities) -->
  <rule ref="SlevomatCodingStandard.Classes.RequireAbstractOrFinal">
    <exclude-pattern>src/Entity</exclude-pattern>
  </rule>

  <!-- Example: add an extra rule -->
  <!-- (e.g. enforce namespace matches file name; useful where PHPStan falls short) -->
  <rule ref="SlevomatCodingStandard.Files.TypeNameMatchesFileName">
    <properties>
      <property name="rootNamespaces" type="array">
        <element key="ptscs" value="Ptscs" />
        <element key="tests" value="Ptscs\Tests" />
      </property>
    </properties>
  </rule>
</ruleset>
```
<p>&nbsp;</p>

## Notable Rules

This coding standard uses PSR-12 with some changes and stricter requirements:

1. `declare(strict_types=1)` is required in all PHP files and must be on the same line as the opening tag:
   ```php
   <?php declare(strict_types=1)
   ```
2. `snake_case` is allowed in test method names:
   ```php
   public function test_something(): void {}
   ```
3. All classes must be declared as `final` or `abstract`:
   ```php
   // Not allowed
   class Foobar {}
   ```
4. Filenames must match class names.

See the full list in [RULES.md](./RULES.md).

<p>&nbsp;</p>

## Contributing
Contributions are welcome! Please open an issue to discuss major changes before submitting a pull request.
<p>&nbsp;</p>

## License
Released under [MIT License](./LICENSE).
