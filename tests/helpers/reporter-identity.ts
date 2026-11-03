import { execFileSync } from 'child_process';

/**
 * Resolves the email of whoever is running the test suite right now, so
 * BugHerd tasks are attributed to the actual developer/machine that
 * triggered the run rather than a fixed, hardcoded identity. Falls back to
 * undefined (BugHerd shows "Anonymous") if git isn't configured — this must
 * never throw and break the reporter.
 */
export function getLocalReporterEmail(): string | undefined {
	try {
		const email = execFileSync('git', ['config', 'user.email'], {
			encoding: 'utf8',
			stdio: ['ignore', 'pipe', 'ignore'],
		}).trim();
		return email || undefined;
	} catch {
		return undefined;
	}
}
