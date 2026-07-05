# Verification

**Integration profile:** P0 — library / SDK (no layout embed).

## Local commands

```bash
composer test
composer phpstan
```

## Clean-app smoke

On a fresh Symfony 7.4+ project:

```bash
composer require symfinity/ui-action
php bin/console debug:container --tag=ui_action 2>/dev/null || true
```

Validate a sample intent in a controller or PHPUnit — expect native `<a>` / `<form method="post">` markup without `data-ui-action` hooks.

## See also

- [Quick start](quickstart.md)
- [CHANGELOG](../CHANGELOG.md)
