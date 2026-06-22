# Usage

Programmatic validation after [Installation](installation.md).

## Validate markup in application code

```php
use Symfinity\UiAction\ActionIntent;
use Symfinity\UiAction\ActionMarkupContext;
use Symfinity\UiAction\NativeActionRules;

$rules = new NativeActionRules();
$result = $rules->validate(
    ActionIntent::Submit,
    new ActionMarkupContext('button', ['type' => 'submit']),
);

if (!$result->isValid()) {
    foreach ($result->violations() as $violation) {
        // log or throw — see contracts/validation-api.md
    }
}
```

## PHPUnit in UX Blocks packages

Use `NativeActionRules` in component integration tests to assert anchors, forms, and buttons match the declared intent. See [UX Blocks integration](contracts/blocks-integration.md).

## Symfony wiring

No bundle required — autowire `NativeActionRules` or instantiate directly. See [Configuration](configuration.md).

## See also

- [Quick start](quickstart.md) — first validation
- [Native action semantics](contracts/native-action-semantics.md) — HTML shape per intent
