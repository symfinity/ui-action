# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [0.1.3] - 2026-07-05

### Added

- Handbook [Verification](docs/verification.md) — P0 integration profile and clean-app smoke (`composer require`, sample intent validation)
- `integration_profile: P0` frontmatter on handbook index (OOTB consumer experience)

### Changed

- PHPUnit bootstrap: `tests/bootstrap.php` resolves monorepo or split-mirror Composer autoload (split CI parity)
- Split mirror CI: Composer package cache and `COMPOSER_AUTH` for reliable dependency installs

### Notes

- No public API or violation code changes — OOTB documentation and test bootstrap hygiene
- PHP library; Flex recipe `0.1` unchanged (`^0.1`, empty `bundles`)

## [0.1.2] - 2026-06-29

### Added

- **[ROADMAP.md](ROADMAP.md)** — public milestone roadmap from 0.1.x through 1.0.x
- **[SUPPORTERS.md](SUPPORTERS.md)** — sponsor acknowledgment page linked from Symfinity OSS funding
- **GitHub Sponsors metadata** — `composer.json` `funding` entry and `.github/FUNDING.yml`

### Notes

- No public API or violation code changes — documentation and maintainer metadata only
- PHP library; Flex recipe `0.1` unchanged (`^0.1`, empty `bundles`)

## [0.1.1] - 2026-06-25

### Changed

- Handbook: [docs/usage.md](docs/usage.md) with programmatic validation and PHPUnit examples; index and README cross-links
- README trimmed — duplicate handbook prose removed; points to `docs/usage.md` for examples
- Composer `description` aligned with split mirror naming (no API change)

### Notes

- No public API changes — patch semver
- PHP library; Flex recipe `0.1` unchanged (`^0.1`, empty `bundles`)

## [0.1.0] - 2026-06-14

### Added

- Initial release of UI Action for native HTTP action semantics validation
- `ActionIntent` enum: `navigate`, `submit`, `delete`, `download`
- `NativeActionRules::validate()` with `ActionMarkupContext`, `ValidationResult`, and `RuleViolation`
- Stable violation codes for forbidden `data-ui-action`, invalid anchors, POST form requirements, and download attributes
- PHPUnit fixtures covering valid and invalid markup contexts per intent
- Consumer handbook under `docs/`
- PHP 8.2+; PHPUnit and PHPStan in CI (PHP 8.2–8.5)
