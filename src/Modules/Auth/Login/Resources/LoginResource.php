<?php

namespace Modules\Auth\Login\Resources;

use Illuminate\Http\Request;
use Modules\CustomResource;

/**
 * @property \Modules\Users\Models\User $resource
 */
class LoginResource extends CustomResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function data(Request $request): array
    {
        return [
            'email' => $this->resource->email,
            'uuid' => $this->resource->uuid,
        ];
    }
}
