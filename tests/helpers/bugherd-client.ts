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

/** Looks up an existing task by its external_id. Returns null if none exists. */
export async function findTaskByExternalId(externalId: string): Promise<BugherdTask | null> {
	const { projectId, headers } = getConfig();
	const res = await fetch(
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
	const res = await fetch(`${API_BASE}/projects/${projectId}/tasks.json`, {
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
	const res = await fetch(`${API_BASE}/projects/${projectId}/tasks/${taskId}/comments.json`, {
		method: 'POST',
		headers,
		body: JSON.stringify({ text }),
	});
	if (!res.ok) {
		throw new Error(`BugHerd comment creation failed: ${res.status} ${await res.text()}`);
	}
}
