<div align="center">

# UI Action

### Native HTTP action semantics validation (navigate, submit, delete, download)

[![PHP Version](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php&logoColor=white)](composer.json)
<br/>
[![CI](https://github.com/symfinity/ui-action/actions/workflows/ci.yml/badge.svg)](https://github.com/symfinity/ui-action/actions/workflows/ci.yml)
<br/>
[![Release](https://img.shields.io/packagist/v/symfinity/ui-action.svg?style=flat&logo=packagist&logoColor=white)](https://packagist.org/packages/symfinity/ui-action)
[![Downloads](https://img.shields.io/packagist/dt/symfinity/ui-action.svg?style=flat&logo=packagist&logoColor=white)](https://packagist.org/packages/symfinity/ui-action)
[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat)](LICENSE)

</div>

> [!NOTE]
> **Read-only mirror.** See [CONTRIBUTING.md](CONTRIBUTING.md).

## Features

- **Native HTTP intents** — `navigate`, `submit`, `delete`, `download` backed enum
- **Markup validation** — `NativeActionRules` checks tag, attributes, and form context without parsing HTML
- **Stable violation codes** — machine-readable failures for PHPUnit and CI
- **Zero Symfony runtime** — pure PHP library; optional autowire in Symfony apps
- **UX Blocks test hook** — component packages assert DOM semantics in dev/test

## Installation

```bash
composer require symfinity/ui-action
```

See [Installation](docs/installation.md) for requirements and a smoke test.

## Quick Start

```php
use Symfinity\UiAction\ActionIntent;
use Symfinity\UiAction\ActionMarkupContext;
use Symfinity\UiAction\NativeActionRules;

$rules = new NativeActionRules();
$result = $rules->validate(
    ActionIntent::Navigate,
    new ActionMarkupContext('a', ['href' => '/dashboard']),
);
```

See [Quick start](docs/quickstart.md) for submit, delete, download examples and violation handling.

## Documentation

- **[Quick start](docs/quickstart.md)** — validate intents in minutes
- **[Installation](docs/installation.md)** — Composer install and smoke test
- **[Configuration](docs/configuration.md)** — programmatic use and Symfony wiring
- **[Usage](docs/usage.md)** — validate intents in app code and PHPUnit
- **[Native action semantics](docs/contracts/native-action-semantics.md)** — HTML shape per intent
- **[Validation API](docs/contracts/validation-api.md)** — types and violation codes
- **[UX Blocks integration](docs/contracts/blocks-integration.md)** — PHPUnit in component packages
- **[Upgrade](docs/upgrade.md)** — first release notes

## Requirements

- PHP 8.2 or higher

## Support

- [GitHub Issues](https://github.com/symfinity/ui-action/issues)
- [Security](.github/SECURITY.md)
- [Contributing](CONTRIBUTING.md)

## License

[MIT](LICENSE)
