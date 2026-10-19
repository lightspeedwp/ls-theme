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
| `scss-build` | `npm run build:css && git add assets/css` | Rebuilds the compressed CSS and stages it, so source and output are committed together. A Sass error blocks the commit. |

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

## Known limits

- `scss-build` compiles the working tree, so unstaged Sass edits are built too. Stash or stage them first.
- `build:css` lists every file by hand. A new Sass entry file must be added to that script or it will not be built.

## Verification (2026-10-19)

| Case | Result |
|---|---|
| Valid Sass change staged | Lint and build pass, `assets/css/faq.css` is staged with the source |
| Sass lint error (`bogus-prop-xyz`) via `git commit` | Commit blocked, build skipped, message shown |
| Sass syntax error via `git commit` | Commit blocked, Sass error shown |

## Uninstall

```bash
npx lefthook uninstall
```
