<?php

namespace Database\Seeders\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use RuntimeException;

trait SeedsFromData
{
    /**
     * Load seed content from database/seeders/data/{name}.php.
     * Fails loudly when the file is missing or empty.
     *
     * @return array<int|string, mixed>
     */
    protected function seedData(string $name): array
    {
        $data = File::getRequire(database_path("seeders/data/{$name}.php"));

        if (! is_array($data) || $data === []) {
            throw new RuntimeException("Seed data [{$name}] is empty.");
        }

        return $data;
    }

    /**
     * Insert each row of the data file only when no record with the same
     * natural key exists. Existing records (possibly edited by admins) are
     * never overwritten.
     *
     * @param  class-string<Model>  $model
     */
    protected function insertMissing(string $model, string $key, string $dataName): void
    {
        foreach ($this->seedData($dataName) as $row) {
            $model::query()->firstOrCreate(
                [$key => $row[$key]],
                Arr::except($row, $key),
            );
        }
    }
}
