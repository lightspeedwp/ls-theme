# Lefthook setup (LSA-191)

Lefthook runs checks on `git commit` so broken Sass never reaches a PR. Config: `lefthook.yml`. Reference: https://lefthook.dev/configuration/

## Install

```bash
npm install
```

`lefthook` is a devDependency. Its postinstall step installs the Git hooks. To check or repair them:

```bash
npx lefthook check-install   # exit 0 = installed and in sync
npx lefthook install         # re-install the hooks
```

## What runs on `pre-commit`

Both jobs run in order (`piped`) and only when staged files match `src/scss/**/*.scss`. They are skipped during merges and rebases.

| Job | Command | Effect |
|---|---|---|
| `scss-lint` | `npx stylelint {staged_files}` | Errors block the commit. Warnings are printed but do not block. |
| `scss-build` | `npm run build:css && git add assets/css` | Rebuilds the compressed CSS and stages it, so source and output are committed together. A Sass error blocks the commit. It first stops the commit if any file in `src/scss` has unstaged changes (see below). |

Stylelint config: `.stylelintrc.json` (`@wordpress/stylelint-config/scss`). Rules that conflict with the existing code are turned off or set to warnings:

- Off: `selector-class-pattern` (260 hits, the theme uses `__` BEM-style class names), plus the empty-line and keyword-case formatting rules.
- Warning: `color-named`, `scss/selector-no-redundant-nesting-selector`, `scss/operator-no-newline-after`.

## Everyday commands

```bash
npx lefthook run pre-commit                    # run the hook on staged files
npx lefthook run pre-commit --all-files        # run it against every file
npx lefthook run pre-commit --job scss-lint    # run one job
npm run lint:scss                              # lint all Sass
npx lefthook dump                              # show the merged config
LEFTHOOK_VERBOSE=1 git commit ...              # debug output
```

## Bypassing

```bash
git commit --no-verify      # skip hooks for one commit
LEFTHOOK=0 git commit ...   # disable Lefthook for one command
```

Personal overrides go in `lefthook-local.yml` (gitignored).

## Unstaged Sass guard

`build:css` compiles every Sass file in the working tree. If a Sass file you are not committing has unstaged edits, its rebuilt CSS would be staged without its source. `scss-build` therefore stops before building when `git diff --quiet -- src/scss` finds unstaged changes, and lists the files. Stage or stash them, then commit again.

A file that is only partly staged is fine: Lefthook hides its unstaged part during the hook, so the CSS is built from the staged part and the unstaged edit is kept in your working tree.

## Known limits

- `build:css` lists every file by hand. A new Sass entry file must be added to that script or it will not be built.

## Requirements

Node `^20.19.0 || >=22.13.0` (`engines` in `package.json`), as required by Stylelint 17 and `@wordpress/stylelint-config`. CI reads `.nvmrc` (`20`), which resolves to the latest 20.x.

## Verification (2026-10-19)

| Case | Result |
|---|---|
| Valid Sass change staged | Lint and build pass, `assets/css/faq.css` is staged with the source |
| Sass lint error (`bogus-prop-xyz`) via `git commit` | Commit blocked, build skipped, message shown |
| Sass syntax error via `git commit` | Commit blocked, Sass error shown |
| One Sass file staged, a different one unstaged, via `git commit` | Commit blocked by the guard, the unstaged file is listed, no CSS is staged |
| Two Sass files, both staged | Passes, both compiled CSS files are staged |
| One Sass file partly staged | Passes, the staged CSS is built from the staged part only and the unstaged edit stays in the working tree |

## Uninstall

```bash
npx lefthook uninstall
```
