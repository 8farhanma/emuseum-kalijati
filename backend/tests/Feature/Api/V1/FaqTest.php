<?php

namespace Tests\Feature\Api\V1;

use App\Models\Faq;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FaqTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_faqs_publicly_in_insertion_order(): void
    {
        Faq::create(['question' => 'Jam buka?', 'answer' => 'Setiap hari.']);
        Faq::create(['question' => 'Tiket?', 'answer' => 'Gratis.']);

        $this->getJson('/api/v1/faqs')
            ->assertOk()
            ->assertJsonCount(2, 'data')
            ->assertJsonStructure(['data' => ['*' => ['question', 'answer']]])
            ->assertJsonMissingPath('data.0.id')
            ->assertJsonPath('data.0.question', 'Jam buka?')
            ->assertJsonPath('data.1.question', 'Tiket?');
    }

    public function test_it_returns_an_empty_list_when_there_are_no_faqs(): void
    {
        $this->getJson('/api/v1/faqs')
            ->assertOk()
            ->assertExactJson(['data' => []]);
    }
}
