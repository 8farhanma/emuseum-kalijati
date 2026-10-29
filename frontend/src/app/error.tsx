"use client";

import { useEffect } from "react";

export default function Error({
    error,
    reset,
}: {
    error: Error & { digest?: string };
    reset: () => void;
}) {
    useEffect(() => {
        console.error(error);
    }, [error]);

    return (
        <main className="mx-auto max-w-3xl px-4 py-10">
            <div role="alert" className="rounded-lg border p-6">
                <h1 className="text-2xl font-bold">Terjadi kendala</h1>
                <p className="mt-3 text-gray-700 dark:text-gray-300">
                    Kami tidak dapat memuat halaman ini saat ini. Silakan coba lagi
                    beberapa saat lagi.
                </p>
                <button
                    type="button"
                    onClick={reset}
                    className="mt-4 rounded-lg border px-4 py-2 font-medium"
                >
                    Coba lagi
                </button>
            </div>
        </main>
    );
}