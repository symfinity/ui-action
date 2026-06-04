# Contract: UI Action ↔ UX Blocks integration

**Version:** 1.0  
**Applies to:** `symfinity/ui-action`, `symfinity/ux-blocks-core`  
**Shipped:** SYMFINITY-7 (2026-06-01)  
**Related:** port-semantics-ref, [native-action-semantics](./native-action-semantics.md), [validation-api](./validation-api.md)

## Principle

UX Blocks own Twig markup; UI Action owns semantic rules. Blocks **MUST** follow [native-action-semantics](./native-action-semantics.md) for interactive roles.

## v0 scope

| Role | Integration |
|------|-------------|
| `button` | `as`, `href`, `type`, `download` via Twig attribute bag (no first-class props unless attribute forwarding fails in tests) |
| `field` / form rows | Standard Symfony Form; submit via form + `type="submit"` button |

## Validation (v0)

| MUST | MUST NOT |
|------|----------|
| PHPUnit in `ux-blocks-core` asserts rendered DOM against `NativeActionRules` | Call `NativeActionRules` at Twig component render/mount time |
| Dev/test `require symfinity/ui-action` when action DOM tests land | Production `require ui-action` or mount-time throws in v0 |

## Composer

- `symfinity/ux-blocks-core` **MAY** `require-dev symfinity/ui-action` when PHPUnit integration lands.
- **MUST NOT** add Turbo/runtime deps for native-action compliance.
