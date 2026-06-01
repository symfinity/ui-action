# Contract: UI Action validation API

**Version:** 1.0  
**Applies to:** `symfinity/ui-action` (`packages/ui-action/`)  
**Shipped:** SYMFINITY-7 (2026-06-01)  
**Related:** [native-action-semantics](./native-action-semantics.md), [blocks-integration](./blocks-integration.md)

## Namespace

| Symbol | FQCN |
|--------|------|
| Enum | `Symfinity\UiAction\ActionIntent` |
| Context | `Symfinity\UiAction\ActionMarkupContext` |
| Result | `Symfinity\UiAction\ValidationResult` |
| Violation | `Symfinity\UiAction\RuleViolation` |
| Rules | `Symfinity\UiAction\NativeActionRules` |

## ActionIntent (backed enum)

Cases: `Navigate`, `Submit`, `Delete`, `Download` (string values: `navigate`, `submit`, `delete`, `download`).

## ActionMarkupContext

Immutable constructor-promoted properties:

| Property | Type | Default |
|----------|------|---------|
| `tag` | string | required |
| `attributes` | `array<string, string\|bool>` | `[]` |
| `parentIsForm` | bool | `false` |
| `formMethod` | ?string | `null` |
| `hasCsrfField` | bool | `false` |

## NativeActionRules

```php
public function validate(ActionIntent $intent, ActionMarkupContext $context): ValidationResult;
```

| MUST | MUST NOT |
|------|----------|
| Return `ValidationResult` (never throw for rule violations) | Parse HTML or depend on Symfony components |
| Reject `data-ui-action` in `attributes` for all intents | Register services or routes |

## Normative violation codes (v0)

| Code | When |
|------|------|
| `forbidden.data_ui_action` | `data-ui-action` attribute present |
| `navigate.requires_anchor` | intent navigate but tag ≠ `a` or missing `href` |
| `navigate.forbidden_button_navigation` | tag `button` without form for navigate |
| `submit.requires_form_post` | intent submit but not `parentIsForm` + `formMethod=post` |
| `submit.requires_submit_type` | intent submit but `type` ≠ `submit` |
| `delete.requires_form_post` | intent delete but not plain POST form context |
| `delete.forbidden_method_override` | attributes or context imply `_method=DELETE` |
| `delete.forbidden_get` | tag `a` with delete intent |
| `download.requires_anchor` | intent download but tag ≠ `a` or missing `href` |
| `download.requires_download_attr` | intent download but missing `download` attribute |

## PHPUnit fixtures

Package **MUST** ship `tests/Fixtures/intent-*.json` (or PHP data providers) covering valid + invalid row per intent. Blocks tests **MAY** import the same fixtures via `require-dev`.

## Versioning

Breaking changes to codes or enum cases require contract version bump and ROADMAP amendment.
