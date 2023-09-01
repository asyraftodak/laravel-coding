<?php

namespace Modules\Users\Resources;

use Illuminate\Http\Request;
use Modules\CustomResource;

class UserResource extends CustomResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function data(Request $request): array
    {
        return [
            'uuid' => $this->resource->uuid,
        ];
    }
}
