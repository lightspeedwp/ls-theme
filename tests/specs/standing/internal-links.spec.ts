import { test } from '../../fixtures/site';
import { checkUrlStatus, extractInternalLinks } from '../../helpers/link-integrity';
import { dedupeUrls } from '../../helpers/url-utils';

test.describe('Internal link integrity', () => {
	test('every internal link on discovered pages resolves without error', async ({
		page,
		request,
		siteUrls,
	}, testInfo) => {
		// Gather links from every discovered page into one deduped set first,
		// then check each unique link once. Checking per-page would re-verify
		// the same nav/footer links on every single page, wasting most of the
		// run on redundant requests.
		const allLinks = new Set<string>();
		for (const { url } of siteUrls) {
			await test.step(`collect links: ${url}`, async () => {
				await page.goto(url);
				const links = await extractInternalLinks(page, process.env.BASE_URL!);
				for (const link of links) allLinks.add(link);
			});
		}

		const uniqueLinks = dedupeUrls([...allLinks]);
		testInfo.setTimeout(testInfo.timeout + uniqueLinks.length * 200);

		// Plain GETs via APIRequestContext — not page navigations — so they
		// can run concurrently instead of one at a time. A small batch size
		// keeps this from hammering the staging server with everything at once.
		const BATCH_SIZE = 10;
		for (let i = 0; i < uniqueLinks.length; i += BATCH_SIZE) {
			const batch = uniqueLinks.slice(i, i + BATCH_SIZE);
			await Promise.all(
				batch.map((link) =>
					test.step(`check: ${link}`, async () => {
						await checkUrlStatus(request, link);
					})
				)
			);
		}
	});
});
