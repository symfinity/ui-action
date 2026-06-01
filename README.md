# symfinity/ui-action

Layer III validation library for native HTTP action semantics (`navigate`, `submit`, `delete`, `download`).

- No Symfony bundle, Twig extensions, or Turbo in v0.
- Normative contracts: [`docs/contracts/`](docs/contracts/) (SYMFINITY-7 shipped 2026-06-01).
- Demo: `ux-blocks-demo` Native actions pack at `/actions`.

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
