# Quick start

Validate markup context against a declared HTTP action intent in a few lines.

## Goal

After this guide you can call `NativeActionRules::validate()` and interpret `ValidationResult` for navigate, submit, delete, and download intents.

## Prerequisites

[Installation](installation.md) completed.

## 1. Pick an intent

```php
use Symfinity\UiAction\ActionIntent;

$intent = ActionIntent::Navigate;
```

Cases: `Navigate`, `Submit`, `Delete`, `Download` (string values: `navigate`, `submit`, `delete`, `download`).

## 2. Describe the markup context

`ActionMarkupContext` captures the element tag, attributes, and optional form parent — not parsed HTML:

```php
use Symfinity\UiAction\ActionMarkupContext;

$context = new ActionMarkupContext(
    tag: 'a',
    attributes: ['href' => '/reports'],
);
```

For submit/delete, set form context:

```php
$context = new ActionMarkupContext(
    tag: 'button',
    attributes: ['type' => 'submit'],
    parentIsForm: true,
    formMethod: 'post',
);
```

## 3. Validate

```php
use Symfinity\UiAction\NativeActionRules;

$rules = new NativeActionRules();
$result = $rules->validate($intent, $context);

if (!$result->valid) {
    foreach ($result->violations as $violation) {
        echo $violation->code . ': ' . $violation->message . PHP_EOL;
    }
}
```

## Complete example — delete via POST form

```php
<?php

require 'vendor/autoload.php';

use Symfinity\UiAction\ActionIntent;
use Symfinity\UiAction\ActionMarkupContext;
use Symfinity\UiAction\NativeActionRules;

$rules = new NativeActionRules();

$validDelete = $rules->validate(
    ActionIntent::Delete,
    new ActionMarkupContext(
        tag: 'button',
        attributes: ['type' => 'submit'],
        parentIsForm: true,
        formMethod: 'post',
        hasCsrfField: true,
    ),
);

$invalidGetLink = $rules->validate(
    ActionIntent::Delete,
    new ActionMarkupContext('a', ['href' => '/items/1']),
);

assert($validDelete->valid);
assert(!$invalidGetLink->valid);
assert($invalidGetLink->violations[0]->code === 'delete.forbidden_get');
```

## Intent cheat sheet

| Intent | Valid shape (v0) |
|--------|------------------|
| Navigate | `<a href="…">` |
| Submit | `<button type="submit">` inside `<form method="post">` |
| Delete | POST form + `type="submit"` button; no GET link, no `_method=DELETE` |
| Download | `<a href="…" download>` |

Details: [Native action semantics](contracts/native-action-semantics.md). Violation codes: [Validation API](contracts/validation-api.md).

## Next steps

- [Configuration](configuration.md) — Symfony service registration
- [UX Blocks integration](contracts/blocks-integration.md) — PHPUnit in component packages
- [CHANGELOG](../CHANGELOG.md), [CONTRIBUTING](../CONTRIBUTING.md), [GitHub Issues](https://github.com/symfinity/ui-action/issues)
