/**
 * Runs once before the test run actually starts — unlike a top-level check in
 * playwright.config.ts, this does NOT run for `--list`, IDE test discovery, or
 * other tooling that merely loads the config without executing anything.
 */
export default function globalSetup() {
	if (!process.env.BASE_URL) {
		throw new Error(
			'BASE_URL is not set. Create a .env file in the theme root with BASE_URL=<your local site URL>.'
		);
	}
}
