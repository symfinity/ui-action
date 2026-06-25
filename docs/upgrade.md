# Upgrade and migration

## First release (`v0.1.0`)

This is the initial public release under `symfinity/ui-action`. There is no migration from a prior Packagist package.

### What you get in v0.1.0

- `ActionIntent` enum (`navigate`, `submit`, `delete`, `download`)
- `NativeActionRules::validate()` with stable violation codes
- PHPUnit fixtures for valid/invalid markup contexts per intent
- Consumer handbook under `docs/`

### Consumer checklist

1. `composer require symfinity/ui-action:^0.1`
2. Use validation in tests or tooling — see [Quick start](quickstart.md)
3. For UX Blocks interactive roles, follow [UX Blocks integration](contracts/blocks-integration.md)

## v0.1.1

Documentation patch after [v0.1.0](https://github.com/symfinity/ui-action/releases/tag/v0.1.0). No PHP API or violation code changes.

```bash
composer update symfinity/ui-action
```

1. Optional: read [Usage](usage.md) for application and PHPUnit patterns
2. README points to the handbook instead of duplicating examples
3. No Composer constraint change — stay on `^0.1`

## Future versions

Breaking changes to enum cases or violation codes will ship with a semver minor/major bump and notes in this file and [CHANGELOG](../CHANGELOG.md).

## See also

- [Configuration](configuration.md)
- [Native action semantics](contracts/native-action-semantics.md)
