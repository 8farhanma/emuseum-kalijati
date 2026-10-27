<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Singleton: the museum profile always lives in the row with id = 1.
 */
class Profile extends Model
{
    public $incrementing = false;

    protected $fillable = ['history', 'vision', 'mission'];
}
