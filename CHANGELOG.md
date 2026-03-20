# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

## [v2.0.0] - 2026-02-20

### Added

- Package-level exception `InvalidGuidException`.

### Changed

- Strings (raw GUIDs) are transformed to lowercase.
- Validation throws package-level exception `InvalidGuidException` instead of built-in one.
- Exception contains invalid value in a message.

## [v1.1.0] - 2026-02-20

### Added

- Method `equals`.

## [v1.0.0] - 2025-05-01
- Add First Version.

[v2.0.0]: https://github.com/battleyephp/guid/compare/v1.1.0...v2.0.0
[v1.1.0]: https://github.com/battleyephp/guid/compare/v1.0.0...v1.1.0
[v1.0.0]: https://github.com/battleyephp/guid/releases/tag/v1.0.0
