<?php

namespace App\Http\Resources\Api\V1;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Profile
 */
class ProfileResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'history' => $this->history,
            'vision' => $this->vision,
            'mission' => $this->mission,
        ];
    }
}
