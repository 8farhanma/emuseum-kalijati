<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IndividualVisitor extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'address', 'occupation'];

    public function visits(): HasMany
    {
        return $this->hasMany(Visit::class);
    }
}
