# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [2.1.1] - 2025-09-19
### Change
  - Prevent installing unsupported `php_codesniffer` version


## [2.1.0] - 2023-11-10
### Added
  - Detect and forbid backticks operator
  - Disallow loose comparison operator
  - Detect and remove useless parentheses
  - Detect and remove useless semicolon


## [2.0.0] - 2023-11-03
### Added
  - Support fully qualified global constant
  - Detect and remove useless property, parameter, and return annotations
  - Detect and remove empty comment
  - Disallow empty function unless contains a comment
  - Use a static closure if possible

### Changed
  - Change the maximum line length to 140 characters.
  - Increase the percentage of commented-out code to 75%

### Removed
  - Remove the rule `SlevomatCodingStandard.Functions.UnusedParameter`


## [1.1.0] - 2023-05-10
### Added
  - Disallow one-line property doc comment rule

### Fixed
  - Fix PSR12 FileHeader incorrect order


## [1.0] - 2023-04-21
Initial release


[Unreleased]: https://github.com/asispts/ptscs/compare/v2.1.0...master
[2.1.0]: https://github.com/asispts/ptscs/releases/tag/v2.1.0
[2.0.0]: https://github.com/asispts/ptscs/releases/tag/v2.0.0
[1.1.0]: https://github.com/asispts/ptscs/releases/tag/v1.1.0
[1.0]: https://github.com/asispts/ptscs/releases/tag/v1.0
