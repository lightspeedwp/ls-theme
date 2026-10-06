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

// Specs that only make sense on a phone/tablet layout (the mobile menu). Desktop projects skip
// them; the device projects below run them.
const DEVICE_ONLY_SPECS = [/mobile-menu\.spec\.ts$/];

// Standing-suite specs that also run once under Mobile Chrome (the only device project that runs
// any standing spec). Standing specs on a device project report to BugHerd under their own
// project-scoped task — see tests/reporters/bugherd-reporter.ts. Add a spec here to widen mobile
// coverage; keep it short, since each entry adds a full discovery run.
const MOBILE_STANDING_SPECS = [/standing\/accessibility\.spec\.ts$/];

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
		// Desktop browsers: everything except the device-only specs below.
		{
			name: 'chromium',
			use: { ...devices['Desktop Chrome'] },
			testIgnore: DEVICE_ONLY_SPECS,
		},

		{
			name: 'firefox',
			use: { ...devices['Desktop Firefox'] },
			testIgnore: DEVICE_ONLY_SPECS,
		},

		{
			name: 'webkit',
			use: { ...devices['Desktop Safari'] },
			testIgnore: DEVICE_ONLY_SPECS,
		},

		// Device projects (LSA-183): real touch/mobile emulation, not just a narrow desktop
		// window, so `(hover: none)` and tap behaviour match a phone. Each runs only the specs
		// listed for it, to avoid multiplying the whole suite's duration. Run one explicitly with
		// e.g. `npx playwright test --project="Mobile Chrome"`; a project's name is exact.
		{
			name: 'Mobile Chrome',
			use: { ...devices['Pixel 5'] },
			testMatch: [...DEVICE_ONLY_SPECS, ...MOBILE_STANDING_SPECS],
		},

		{
			name: 'Mobile Safari',
			use: { ...devices['iPhone 12'] },
			testMatch: DEVICE_ONLY_SPECS,
		},

		{
			name: 'Tablet',
			use: { ...devices['iPad Mini'] },
			testMatch: DEVICE_ONLY_SPECS,
		},

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
