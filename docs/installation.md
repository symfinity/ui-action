# Installation

## Requirements

- PHP 8.2 or higher
- No Symfony runtime dependency (optional when used inside Symfony apps for autowiring)

## Composer

```bash
composer require symfinity/ui-action:^0.1
```

Autoloading is PSR-4 via Composer; no bundle registration or extra bootstrap step.

## Verify

From your project root (with this package in `require-dev` for a library consumer):

```bash
vendor/bin/phpunit --filter NativeActionRulesTest
```

Or run a one-line smoke in a script:

```php
<?php

require 'vendor/autoload.php';

use Symfinity\UiAction\ActionIntent;
use Symfinity\UiAction\ActionMarkupContext;
use Symfinity\UiAction\NativeActionRules;

$result = (new NativeActionRules())->validate(
    ActionIntent::Navigate,
    new ActionMarkupContext('a', ['href' => '/dashboard']),
);

var_dump($result->valid); // bool(true)
```

## Next steps

[Quick start](quickstart.md).
