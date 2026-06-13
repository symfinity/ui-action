# Security Policy

## Supported Versions

| Version | Supported |
|---------|-----------|
| 0.1.x   | Yes       |

## Reporting a Vulnerability

If you discover a security vulnerability, **do not** open a public issue. Email **dev@symfinity.net** with:

- Type of vulnerability
- Full paths of source file(s) related to the issue
- The location of the affected code (tag, branch, commit, or URL)
- Step-by-step reproduction instructions
- Proof-of-concept or exploit code (if possible)
- Impact and plausible attack scenario

We aim to acknowledge within 48 hours and provide a detailed response within 7 days.

## Security best practices

UI Action validates markup semantics in tests and tooling — it does not execute HTTP requests or mutate live pages:

1. Use validation results in CI and PHPUnit; do not rely on this library as a runtime security gate in production without your own review
2. Keep PHP and test dependencies updated in projects that consume this library

## Security contact

**dev@symfinity.net**
