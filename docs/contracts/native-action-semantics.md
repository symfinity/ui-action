# Contract: Native action semantics (UI Action layer)

**Version:** 1.0  
**Applies to:** `symfinity/ui-action`, `symfinity/ux-blocks-core` interactive roles  
**Shipped:** SYMFINITY-7 (2026-06-01)  
**Constitution:** Chameleon UI Layer Constitution § III

## Principle

If an element performs HTTP-visible behaviour in v0, it **MUST** use native HTML — **MUST NOT** use `data-ui-action` or runtime-only hooks.

## Intent mapping (normative v0)

| Intent | Required shape | Notes |
|--------|----------------|-------|
| **navigate** | `<a href="…">` or `Button as="a"` + `href` | Full page GET |
| **submit** | `<button type="submit">` inside `<form method="post" action="…">` | CSRF via Symfony Form |
| **delete** | `<form method="post">` + `<button type="submit">` (or `Button type="submit"`) inside form; CSRF token required in app | Plain POST only in v0 — **MUST NOT** use GET delete or `_method=DELETE` |
| **download** | `<a href="…" download="filename">` | Browser-native |

## Strict button rule

| MUST | MUST NOT |
|------|----------|
| Use `as="a"` + `href` when navigation/download | `as="button"` + JS-only navigation |
| Use `type="submit"` inside a form for mutations | Bare `<button>` claiming submit without form |
| Inert `as="button"` only when no HTTP action | `data-ui-action` in native-action scope |

## Verification

Demo and component tests **MUST** assert absence of `data-ui-action` on native-action pages unless **008** is explicitly installed and documented.
