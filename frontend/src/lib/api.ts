import { cacheLife } from "next/cache";
import type { ApiResponse, Faq } from "@/types/api";

function getApiBaseUrl(): string {
    const url = process.env.API_BASE_URL;
    if (!url) {
        throw new Error(
            "API_BASE_URL is not set. Copy .env.example to .env.local."
        );
    }
    return url;
}

async function apiGet<T>(path: string): Promise<T> {
    const response = await fetch(`${getApiBaseUrl()}${path}`, {
        headers: { Accept: "application/json" },
    });

    if (!response.ok) {
        throw new Error(`GET ${path} failed: ${response.status} ${response.statusText}`);
    }

    const body = (await response.json()) as ApiResponse<T>;
    if (body.data === undefined) {
        throw new Error(`GET ${path} returned an unexpected response shape`);
    }
    return body.data;
}

export async function getFaqs(): Promise<Faq[]> {
    "use cache";
    cacheLife("hours");
    return apiGet<Faq[]>("/faqs");
}