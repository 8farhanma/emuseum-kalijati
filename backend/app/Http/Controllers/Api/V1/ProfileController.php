<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\ProfileResource;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function show(): ProfileResource
    {
        // Singleton row: the DB CHECK constraint guarantees id = 1.
        return new ProfileResource(Profile::findOrFail(1));
    }
}
