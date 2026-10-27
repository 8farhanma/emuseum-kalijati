<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Singleton: the only allowed row has id = 1, enforced by the CHECK below.
        // The id is not auto-increment (MySQL forbids CHECK on auto-increment columns).
        Schema::create('profiles', function (Blueprint $table) {
            $table->unsignedTinyInteger('id')->primary();
            $table->text('history')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->timestamps();
        });
        $this->addCheck('profiles', 'profiles_singleton_check', 'id = 1');

        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question')->unique();
            $table->text('answer');
            $table->timestamps();
        });

        // `code` is the stable public identifier (printed in QR codes, used in URLs).
        // Treat it as immutable once a QR label has been printed.
        Schema::create('artifacts', function (Blueprint $table) {
            $table->id();
            $table->string('code', 16)->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->timestamps();
        });

        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('author')->nullable();
            $table->string('category', 100)->nullable()->index();
            $table->longText('content')->nullable();
            $table->string('image_path')->nullable();
            $table->date('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('individual_visitors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address')->nullable();
            $table->string('occupation')->nullable();
        });

        Schema::create('group_visitors', function (Blueprint $table) {
            $table->id();
            $table->string('leader_name');
            $table->string('institution');
            $table->unsignedInteger('member_count');
        });

        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->date('visit_date')->index();
            $table->text('reason')->nullable();
            $table->enum('visitor_type', ['individual', 'group']);
            $table->foreignId('individual_visitor_id')->nullable()
                ->constrained('individual_visitors')->restrictOnDelete();
            $table->foreignId('group_visitor_id')->nullable()
                ->constrained('group_visitors')->restrictOnDelete();
        });
        // Exactly one visitor FK is set, and it matches visitor_type.
        $this->addCheck('visits', 'visits_visitor_consistency_check', "
            (visitor_type = 'individual' AND individual_visitor_id IS NOT NULL AND group_visitor_id IS NULL)
            OR
            (visitor_type = 'group' AND group_visitor_id IS NOT NULL AND individual_visitor_id IS NULL)
        ");

        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name', 25);
            $table->string('city', 25)->nullable();
            $table->text('content');
            $table->unsignedTinyInteger('service_rating');
            $table->unsignedTinyInteger('facility_rating');
            $table->unsignedTinyInteger('cleanliness_rating');
            // Derived value: computed by the database, never written by the app.
            $table->decimal('average_rating', 3, 2)
                ->virtualAs('ROUND((service_rating + facility_rating + cleanliness_rating) / 3.0, 2)');
            $table->timestamps();
        });
        $this->addCheck('reviews', 'reviews_ratings_range_check', '
            service_rating BETWEEN 1 AND 5
            AND facility_rating BETWEEN 1 AND 5
            AND cleanliness_rating BETWEEN 1 AND 5
        ');
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('visits');
        Schema::dropIfExists('group_visitors');
        Schema::dropIfExists('individual_visitors');
        Schema::dropIfExists('publications');
        Schema::dropIfExists('artifacts');
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('profiles');
    }

    /**
     * Blueprint has no CHECK builder, so add it with raw SQL.
     * SQLite cannot ALTER ... ADD CONSTRAINT, so it is skipped there.
     */
    private function addCheck(string $table, string $name, string $expression): void
    {
        if (DB::getDriverName() === 'sqlite') {
            return;
        }

        DB::statement("ALTER TABLE {$table} ADD CONSTRAINT {$name} CHECK ({$expression})");
    }
};