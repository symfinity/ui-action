<div align="center">

# Ui Action

### Symfinity UI Action — native HTTP action semantics validation (navigate, submit, delete, download)

[![PHP Version](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php&logoColor=white)](composer.json)

<br/>
[![PHPUnit](https://github.com/symfinity/symfinity/actions/workflows/phpunit.yml/badge.svg)](https://github.com/symfinity/symfinity/actions/workflows/phpunit.yml)
[![Coverage](https://github.com/symfinity/symfinity/actions/workflows/coverage.yml/badge.svg)](https://github.com/symfinity/symfinity/actions/workflows/coverage.yml)
[![PHPStan](https://github.com/symfinity/symfinity/actions/workflows/phpstan.yml/badge.svg)](https://github.com/symfinity/symfinity/actions/workflows/phpstan.yml)
<br/>
[![Psalm](https://github.com/symfinity/symfinity/actions/workflows/psalm.yml/badge.svg)](https://github.com/symfinity/symfinity/actions/workflows/psalm.yml)
[![Infection](https://github.com/symfinity/symfinity/actions/workflows/infection.yml/badge.svg)](https://github.com/symfinity/symfinity/actions/workflows/infection.yml)
[![Code Style](https://img.shields.io/badge/code%20style-CS%20Fixer-5c4dbc?style=flat)](https://github.com/symfinity/symfinity/actions/workflows/php-cs-fixer.yml)
<br/>
[![Release](https://img.shields.io/packagist/v/symfinity/ui-action.svg?style=flat&logo=packagist&logoColor=white)](https://packagist.org/packages/symfinity/ui-action)
[![Downloads](https://img.shields.io/packagist/dt/symfinity/ui-action.svg?style=flat&logo=packagist&logoColor=white)](https://packagist.org/packages/symfinity/ui-action)
[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat)](LICENSE)

</div>

---

## Documentation

| Topic | Page |
|-------|------|
| Configuration | [docs/configuration.md](docs/configuration.md) |
| Index | [docs/index.md](docs/index.md) |
| Installation | [docs/installation.md](docs/installation.md) |
| Quickstart | [docs/quickstart.md](docs/quickstart.md) |
| Reference | [docs/reference.md](docs/reference.md) |
| Troubleshooting | [docs/troubleshooting.md](docs/troubleshooting.md) |
| Upgrade | [docs/upgrade.md](docs/upgrade.md) |
| Usage | [docs/usage.md](docs/usage.md) |
| Contracts/Blocks Integration | [docs/contracts/blocks-integration.md](docs/contracts/blocks-integration.md) |
| Contracts/Native Action Semantics | [docs/contracts/native-action-semantics.md](docs/contracts/native-action-semantics.md) |
| Contracts/Validation Api | [docs/contracts/validation-api.md](docs/contracts/validation-api.md) |

## Requirements

- PHP 8.2+

## Install

```bash
composer require symfinity/ui-action
```

## Usage

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

UX Blocks consume this package in **PHPUnit only** (see `ux-blocks-core` `ButtonActionTest`).

## Tests

```bash
cd src/symfinity
./bin/php vendor/bin/phpunit packages/ui-action/tests/
```
