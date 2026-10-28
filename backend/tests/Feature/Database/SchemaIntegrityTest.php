<?php

namespace Tests\Feature\Database;

use App\Enums\VisitorType;
use App\Models\Artifact;
use App\Models\IndividualVisitor;
use App\Models\Review;
use App\Models\Visit;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class SchemaIntegrityTest extends TestCase
{
    use RefreshDatabase;

    public function test_profiles_only_accepts_row_one(): void
    {
        $this->skipWithoutCheckConstraints();

        $this->assertRejected(fn () => DB::table('profiles')->insert(['id' => 2]));
    }

    public function test_visit_requires_exactly_one_matching_visitor(): void
    {
        $this->skipWithoutCheckConstraints();

        $visitor = IndividualVisitor::create(['name' => 'Budi']);
        $groupId = DB::table('group_visitors')->insertGetId([
            'leader_name' => 'Siti',
            'institution' => 'SMA Contoh',
            'member_count' => 30,
        ]);

        $valid = Visit::create([
            'visit_date' => '2026-03-01',
            'visitor_type' => VisitorType::Individual,
            'individual_visitor_id' => $visitor->id,
        ]);
        $this->assertTrue($valid->exists);

        $base = ['visit_date' => '2026-03-01'];

        // individual type without a visitor
        $this->assertRejected(fn () => DB::table('visits')->insert($base + [
            'visitor_type' => 'individual',
        ]));

        // group type pointing at an individual visitor
        $this->assertRejected(fn () => DB::table('visits')->insert($base + [
            'visitor_type' => 'group',
            'individual_visitor_id' => $visitor->id,
        ]));

        // both visitors set
        $this->assertRejected(fn () => DB::table('visits')->insert($base + [
            'visitor_type' => 'individual',
            'individual_visitor_id' => $visitor->id,
            'group_visitor_id' => $groupId,
        ]));
    }

    public function test_visitor_with_visits_cannot_be_deleted(): void
    {
        $visitor = IndividualVisitor::create(['name' => 'Budi']);
        Visit::create([
            'visit_date' => '2026-03-01',
            'visitor_type' => VisitorType::Individual,
            'individual_visitor_id' => $visitor->id,
        ]);

        $this->assertRejected(fn () => $visitor->delete());
    }

    public function test_review_ratings_must_be_between_one_and_five(): void
    {
        $this->skipWithoutCheckConstraints();

        foreach ([0, 6] as $invalid) {
            $this->assertRejected(fn () => DB::table('reviews')->insert([
                'name' => 'Ani',
                'content' => 'Bagus',
                'service_rating' => $invalid,
                'facility_rating' => 3,
                'cleanliness_rating' => 3,
            ]));
        }
    }

    public function test_review_average_rating_is_computed_by_the_database(): void
    {
        $review = Review::create([
            'name' => 'Ani',
            'content' => 'Bagus',
            'service_rating' => 5,
            'facility_rating' => 4,
            'cleanliness_rating' => 4,
        ]);

        $this->assertSame('4.33', $review->refresh()->average_rating);
    }

    public function test_artifact_code_must_be_unique(): void
    {
        Artifact::create(['code' => 'KLJ-001', 'name' => 'Koleksi A']);

        $this->assertRejected(fn () => Artifact::create(['code' => 'KLJ-001', 'name' => 'Koleksi B']));
    }

    private function assertRejected(callable $write): void
    {
        try {
            $write();
        } catch (QueryException) {
            $this->addToAssertionCount(1);

            return;
        }

        $this->fail('Expected the database to reject this write.');
    }

    private function skipWithoutCheckConstraints(): void
    {
        if (DB::getDriverName() === 'sqlite') {
            $this->markTestSkipped('CHECK constraints are not applied on SQLite.');
        }
    }
}
