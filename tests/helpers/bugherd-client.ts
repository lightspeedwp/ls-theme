/**
 * Minimal BugHerd API v2 client, scoped to exactly what the standing-suite
 * reporter needs: find a task by its external_id, create a task, and add a
 * comment. No other BugHerd operations are exposed on purpose.
 */

const API_BASE = 'https://www.bugherd.com/api_v2';

export type BugherdTask = {
	id: number;
	external_id: string | null;
	status: string;
	closed_at: string | null;
	admin_link?: string;
};

export type CreateTaskPayload = {
	description: string;
	external_id: string;
	tag_names: string[];
	priority?: 'critical' | 'important' | 'normal' | 'minor';
	requester_email?: string;
};

function getConfig() {
	const apiKey = process.env.BUGHERD_API_KEY;
	const projectId = process.env.BUGHERD_PROJECT_ID;
	if (!apiKey || !projectId) {
		throw new Error(
			'BUGHERD_API_KEY and BUGHERD_PROJECT_ID must be set in .env for the BugHerd reporter to run.'
		);
	}
	const auth = Buffer.from(`${apiKey}:x`).toString('base64');
	return { projectId, headers: { Authorization: `Basic ${auth}`, 'Content-Type': 'application/json' } };
}

const MAX_RATE_LIMIT_RETRIES = 3;

function sleep(ms: number): Promise<void> {
	return new Promise((resolve) => setTimeout(resolve, ms));
}

/**
 * Wraps fetch() with retry-with-backoff specifically for HTTP 429. Without
 * this, a rate-limited burst during a run with many distinct failure groups
 * silently drops those specific bug reports — the caller's generic
 * `!res.ok` handling treats a 429 exactly like any other failure (auth
 * error, malformed payload) and gives up immediately. Honors the API's own
 * Retry-After header when present; otherwise backs off exponentially.
 */
async function fetchWithRetry(url: string, init: RequestInit): Promise<Response> {
	for (let attempt = 0; ; attempt++) {
		const res = await fetch(url, init);
		if (res.status !== 429 || attempt >= MAX_RATE_LIMIT_RETRIES) {
			return res;
		}
		const retryAfterHeader = res.headers.get('Retry-After');
		const retryAfterMs = retryAfterHeader ? Number(retryAfterHeader) * 1000 : NaN;
		const delayMs = Number.isFinite(retryAfterMs) ? retryAfterMs : 1000 * 2 ** attempt;
		console.log(
			`[bugherd-client] Rate limited (429) — retrying in ${delayMs}ms (attempt ${attempt + 1}/${MAX_RATE_LIMIT_RETRIES})`
		);
		await sleep(delayMs);
	}
}

/** Looks up an existing task by its external_id. Returns null if none exists. */
export async function findTaskByExternalId(externalId: string): Promise<BugherdTask | null> {
	const { projectId, headers } = getConfig();
	const res = await fetchWithRetry(
		`${API_BASE}/projects/${projectId}/tasks.json?external_id=${encodeURIComponent(externalId)}`,
		{ headers }
	);
	if (!res.ok) {
		throw new Error(`BugHerd task lookup failed: ${res.status} ${await res.text()}`);
	}
	const json = (await res.json()) as { tasks: BugherdTask[] };
	return json.tasks[0] ?? null;
}

/** Creates a new BugHerd task. */
export async function createTask(payload: CreateTaskPayload): Promise<BugherdTask> {
	const { projectId, headers } = getConfig();
	const res = await fetchWithRetry(`${API_BASE}/projects/${projectId}/tasks.json`, {
		method: 'POST',
		headers,
		body: JSON.stringify({ task: payload }),
	});
	if (!res.ok) {
		throw new Error(`BugHerd task creation failed: ${res.status} ${await res.text()}`);
	}
	const json = (await res.json()) as { task: BugherdTask };
	return json.task;
}

/** Adds a comment to an existing task. */
export async function addComment(taskId: number, text: string): Promise<void> {
	const { projectId, headers } = getConfig();
	const res = await fetchWithRetry(`${API_BASE}/projects/${projectId}/tasks/${taskId}/comments.json`, {
		method: 'POST',
		headers,
		body: JSON.stringify({ text }),
	});
	if (!res.ok) {
		throw new Error(`BugHerd comment creation failed: ${res.status} ${await res.text()}`);
	}
}
