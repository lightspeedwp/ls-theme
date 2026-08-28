import { defineConfig, devices } from '@playwright/test';

/**
 * Read environment variables from file.
 * https://github.com/motdotla/dotenv
 */
import dotenv from 'dotenv';
import path from 'path';
import { fileURLToPath } from 'url';
// This repo's package.json has "type": "module", so __dirname (assumed by
// Playwright's own generated template) isn't available here. Using
// fileURLToPath(import.meta.url) instead of import.meta.dirname so this
// works across the full declared engines.node range (>=20.0.0) —
// import.meta.dirname only exists from Node 20.11.0 onward.
const __dirname = path.dirname(fileURLToPath(import.meta.url));
dotenv.config({ path: path.resolve(__dirname, '.env') });

/**
 * See https://playwright.dev/docs/test-configuration.
 */
export default defineConfig({
	// Deviation from the installer default ('./tests'): this repo's tests
	// live under tests/specs (established in LS-2244, before this ticket).
	testDir: './tests/specs',
	// Validates BASE_URL only when tests actually run, not when the config is
	// merely loaded (e.g. `--list`, IDE test discovery) — see tests/global-setup.ts.
	globalSetup: './tests/global-setup.ts',
	/* Run tests in files in parallel */
	fullyParallel: true,
	/* Fail the build on CI if you accidentally left test.only in the source code. */
	forbidOnly: !!process.env.CI,
	/* Retry on CI only */
	retries: process.env.CI ? 2 : 0,
	/* Opt out of parallel tests on CI. */
	workers: process.env.CI ? 1 : 4,
	// Config-level safety net: the standing suite's own specs extend this
	// per-test via testInfo.setTimeout() based on how many pages they visit,
	// but a spec that forgets to call it falls back to this instead of the
	// bare Playwright default (30s), which is too tight for a real site.
	timeout: 60_000,
	/* Reporter to use. See https://playwright.dev/docs/test-reporters */
	// bugherd-reporter self-filters to tests/specs/standing/ only — feature
	// specs (header-search.spec.ts etc.) never reach it, even on failure.
	reporter: [['html'], ['./tests/reporters/bugherd-reporter.ts']],
	/* Shared settings for all the projects below. See https://playwright.dev/docs/api/class-testoptions. */
	use: {
		/* Base URL to use in actions like `await page.goto('')`. */
		baseURL: process.env.BASE_URL,

		/* Collect trace when retrying the failed test. See https://playwright.dev/docs/trace-viewer */
		trace: 'on-first-retry',
	},

	/* Configure projects for major browsers */
	projects: [
		{
			name: 'chromium',
			use: { ...devices['Desktop Chrome'] },
		},

		{
			name: 'firefox',
			use: { ...devices['Desktop Firefox'] },
		},

		{
			name: 'webkit',
			use: { ...devices['Desktop Safari'] },
		},

		/* Test against mobile viewports. */
		// {
		//   name: 'Mobile Chrome',
		//   use: { ...devices['Pixel 5'] },
		// },
		// {
		//   name: 'Mobile Safari',
		//   use: { ...devices['iPhone 12'] },
		// },

		/* Test against branded browsers. */
		// {
		//   name: 'Microsoft Edge',
		//   use: { ...devices['Desktop Edge'], channel: 'msedge' },
		// },
		// {
		//   name: 'Google Chrome',
		//   use: { ...devices['Desktop Chrome'], channel: 'chrome' },
		// },
	],

	/* Run your local dev server before starting the tests */
	// webServer: {
	//   command: 'npm run start',
	//   url: 'http://localhost:3000',
	//   reuseExistingServer: !process.env.CI,
	// },
});
