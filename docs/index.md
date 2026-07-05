---
integration_profile: P0
---

# UI Action

Validate that interactive markup uses **native HTTP semantics** — anchors for navigation and download, POST forms for submit and delete — without `data-ui-action` hooks.

## Handbook

- [Installation](installation.md) — Composer install
- [Quick start](quickstart.md) — validate your first intent
- [Configuration](configuration.md) — programmatic use and Symfony wiring
- [Usage](usage.md) — validate intents in app code and PHPUnit
- [Upgrade](upgrade.md) — first release and future migrations

## Semantics and API

- [Native action semantics](contracts/native-action-semantics.md) — intent → HTML shape (v0)
- [Validation API](contracts/validation-api.md) — `NativeActionRules`, violation codes
- [UX Blocks integration](contracts/blocks-integration.md) — how component tests consume this library
