import type { Metadata } from "next";
import { getFaqs } from "@/lib/api";

export const metadata: Metadata = {
    title: "FAQ | Rumah Sejarah Kalijati",
    description:
        "Pertanyaan yang sering diajukan seputar Rumah Sejarah Kalijati.",
};

export default async function FaqPage() {
    const faqs = await getFaqs();

    return (
        <main className="mx-auto max-w-3xl px-4 py-10">
            <h1 className="mb-6 text-3xl font-bold">Pertanyaan yang Sering Diajukan</h1>

            <div className="space-y-3">
                {faqs.map((faq) => (
                    <details key={faq.question} className="rounded-lg border p-4">
                        <summary className="cursor-pointer font-medium">
                            {faq.question}
                        </summary>
                        <p className="mt-3 text-gray-700 dark:text-gray-300">{faq.answer}</p>
                    </details>
                ))}
            </div>
        </main>
    );
}