<?php

namespace Modules\Auth\Verify\Resources;

use Illuminate\Http\Request;
use Modules\CustomResource;
use Modules\Users\Resources\UserResource;

/**
 * @property \Modules\Users\Models\User $resource
 */
class VerifyResource extends CustomResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function data(Request $request): array
    {
        return [
            'user' => UserResource::make($this->resource),
            'token' => $this->resource->createToken(config('app.name'))->plainTextToken,
        ];
    }
}
