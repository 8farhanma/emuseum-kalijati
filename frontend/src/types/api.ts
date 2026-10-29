// Envelope standar API: { data: ... }
export type ApiResponse<T> = {
    data: T;
};

export type Faq = {
    question: string;
    answer: string;
};