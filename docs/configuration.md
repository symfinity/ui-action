# Configuration

UI Action is a **standalone PHP library**. There is no bundle YAML and no runtime configuration file.

## Programmatic use

Instantiate `NativeActionRules` directly (stateless — safe to reuse):

```php
use Symfinity\UiAction\NativeActionRules;

$rules = new NativeActionRules();
```

All behaviour is driven by the `ActionIntent` and `ActionMarkupContext` passed to `validate()`. See [Validation API](contracts/validation-api.md) for property defaults.

## Symfony integration (optional)

When you call validation from application code, register the rules class as a service:

```yaml
# config/services.yaml
services:
    Symfinity\UiAction\NativeActionRules: ~
```

Inject it where needed:

```php
public function __construct(
    private NativeActionRules $actionRules,
) {
}
```

**v0 note:** UX Blocks and similar packages use this library in **PHPUnit only** — not at Twig render time. See [UX Blocks integration](contracts/blocks-integration.md).

## Test fixtures

The package ships PHP fixtures in `tests/Support/IntentFixtures.php` covering valid and invalid rows per intent. Component packages may `require-dev symfinity/ui-action` and reuse the same patterns in DOM assertion tests.

## See also

- [Quick start](quickstart.md)
- [Upgrade](upgrade.md)
