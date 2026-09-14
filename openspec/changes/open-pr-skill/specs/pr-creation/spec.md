## ADDED Requirements

### Requirement: Gather PR context from the branch itself
The system SHALL derive all PR content (title, body, category of work) from the current branch's own commits, diff, and referenced ticket numbers, and MUST NOT rely on assumed prior conversation context.

#### Scenario: Fresh session with zero prior context
- **WHEN** the skill is invoked in a session that has no memory of what was discussed to produce the current branch
- **THEN** the system inspects `git log <base>..HEAD` and `git diff <base>...HEAD` to reconstruct what changed and why, and produces the same PR content it would have with full conversation context

#### Scenario: Ticket number present in commits or branch name
- **WHEN** a commit message, branch name, or code comment references an issue/ticket number
- **THEN** the system looks up that ticket for additional context if a tool is available, and does not invent ticket details if no tool is available

### Requirement: Pre-flight checks before creating a PR
The system SHALL verify the branch is not `develop`/`main`, has commits ahead of the base, and is pushed to `origin` before attempting to create a PR, and MUST check for an existing open PR on the branch before creating a duplicate.

#### Scenario: Branch has unpushed commits
- **WHEN** the current branch has commits ahead of `origin` that have not been pushed
- **THEN** the system pushes the branch before running `gh pr create`

#### Scenario: An open PR already exists for this branch
- **WHEN** `gh pr list --head <branch-name>` returns an existing open PR
- **THEN** the system updates that PR instead of creating a duplicate

### Requirement: Labels and assignee are part of the PR-creation call
The system SHALL include labels and assignee in the same `gh pr create` (or `gh pr edit`) invocation used to create or update the PR, and MUST NOT treat labels or assignee as a separate step that can be run after PR creation and skipped.

#### Scenario: Creating a new PR
- **WHEN** the system runs `gh pr create` for a new PR
- **THEN** that same command invocation includes `--label` flags for labels chosen from the repo's real label set (`gh label list`) and `--assignee brandonmarshal`

#### Scenario: Updating an existing PR missing labels or assignee
- **WHEN** the system is updating an existing PR that does not yet have labels or an assignee set
- **THEN** the system adds them immediately via `gh pr edit --add-label ... --add-assignee brandonmarshal` as part of the same update pass, not deferred to a later step

#### Scenario: No real label fits the change
- **WHEN** none of the repo's existing labels (from `gh label list`) accurately describe the change
- **THEN** the system does not invent a new label and proceeds without a label rather than guessing

### Requirement: Changelog entry links to the created PR
The system SHALL add a required `CHANGELOG.md` entry only after the PR has been created, and MUST include a link/reference to that PR in the entry.

#### Scenario: Repo requires a changelog entry
- **WHEN** the repo's contributor guidance documents a required `CHANGELOG.md` entry and the branch's work lacks one
- **THEN** the system creates the PR first, then adds the changelog entry referencing the resulting PR URL or number, then commits and pushes that changelog update to the same branch

#### Scenario: Repo does not require a changelog entry
- **WHEN** the repo's contributor guidance does not document a required changelog process
- **THEN** the system does not add a changelog entry and does not block PR creation on one

### Requirement: Dual invocation with a safety guard on implicit triggers
The system SHALL be invocable both via an explicit `/open-pr` command and via a natural-language request to open/create/ship a pull request, and MUST confirm the target branch and base with the user before running `gh pr create` when triggered implicitly rather than via the explicit command.

#### Scenario: Explicit invocation
- **WHEN** the user types `/open-pr`
- **THEN** the system proceeds directly through pre-flight checks and PR creation without an extra confirmation step

#### Scenario: Implicit natural-language invocation
- **WHEN** the user asks in natural language to create/open/ship a PR (e.g. "create the PR for me") without using the `/open-pr` command
- **THEN** the system confirms the target branch and base with the user before running `gh pr create`

### Requirement: No fabricated verification in the PR body
The system SHALL only mark Test Plan items as complete when they were genuinely run or verified during the current session, and MUST leave manual-QA items unchecked/pending rather than marking them done to appear complete.

#### Scenario: A validation command was actually run this session
- **WHEN** a lint/test/validation command applicable to the changed files was run during pre-flight checks and passed
- **THEN** the corresponding Test Plan item is checked off with that real result

#### Scenario: A check requires manual QA the agent cannot perform
- **WHEN** a Test Plan item requires manual browser/UI verification that was not actually performed in this session
- **THEN** that item is left unchecked and listed as pending, not marked done
