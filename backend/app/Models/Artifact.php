<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artifact extends Model
{
    protected $fillable = ['code', 'name', 'description', 'image_path'];

    /**
     * The code is the stable public identifier (URLs and printed QR labels).
     */
    public function getRouteKeyName(): string
    {
        return 'code';
    }
}
