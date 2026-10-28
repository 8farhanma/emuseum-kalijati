<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GroupVisitor extends Model
{
    public $timestamps = false;

    protected $fillable = ['leader_name', 'institution', 'member_count'];

    public function visits(): HasMany
    {
        return $this->hasMany(Visit::class);
    }
}
