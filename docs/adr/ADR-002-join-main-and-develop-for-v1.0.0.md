---
title: 'ADR-002: Join main and develop histories for the v1.0.0 release'
description: Decision to release v1.0.0 from a release branch that joins the one-commit main scaffold to develop, merged with a merge commit
file_type: documentation
date: 2026-11-02T00:00:00.000Z
adr_status: accepted
status: active
authors:
  - LightSpeed Team
---

# ADR-002: Join main and develop histories for the v1.0.0 release

## Status

✅ **Accepted**, implemented for v1.0.0 (Linear LSA-181, ls-theme#94)

## Context

`main` holds a single "Initialize main" commit that scaffolds the repository. All real work happened on `develop`, which was created independently, so the two branches have no common ancestor. GitHub cannot open a pull request between branches with no shared history, and the release workflow expects `main` to carry the released code.

Options considered:

1. **Release branch joins the histories:** branch from `main`, merge `develop` with `--allow-unrelated-histories`, add the release commit, and open a PR to `main`.
2. **Reset `main` to `develop`:** force-push `develop` over `main`.
3. **Replace `main` with a new root:** discard the scaffold commit and promote `develop`.

## Decision

**Use option 1.** `release/v1.0.0` is created from `origin/main`, then `origin/develop` is merged into it with `--allow-unrelated-histories`. Every conflict is resolved in favour of `develop`, and files that exist only on `main` are removed, so the tree matches `develop` exactly before the release commit. One release commit on top bumps the versions and rewrites the changelog.

The PR to `main` is merged with a **merge commit**, never squashed, so `develop`'s history stays reachable from `main`. The `v1.0.0` tag is created by hand after the merge.

## Rationale

- No force-push or history rewrite on `main`.
- The scaffold commit stays in history, and `main` and `develop` share ancestry from the merge onward.
- The diff against `main` is the whole theme, but reviewers only need to read the release commit, because the join commit is verified to leave the tree identical to `develop`.

## Consequences

**Positive:**

- ✅ `develop` and `main` can be compared and merged normally from now on.
- ✅ No history is lost.
- ✅ The release is reviewable as a single commit.

**Negative:**

- ❌ The first PR to `main` shows the whole theme as changed.
- ❌ A squash merge would break the shared history, so it must not be used.

## Related Decisions

- Org ADR-001, [Develop-First Release Flow](https://github.com/lightspeedwp/.github/blob/main/docs/ADRs/ADR-001-develop-first-release-flow.md), describes the usual flow once `main` and `develop` share history. This record covers the one-time join that makes that flow possible.

## References

- [ADR-001: Release 1.0.0 breaking changes](./ADR-001-release-1-0-breaking-changes.md)
- [CHANGELOG.md](../../CHANGELOG.md): the 1.0.0 section and breaking changes
- [Migrating to 1.0](../migrating-to-1.0.md)
