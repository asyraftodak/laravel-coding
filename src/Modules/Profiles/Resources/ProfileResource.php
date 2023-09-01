<?php

namespace Modules\Profiles\Resources;

use Illuminate\Http\Request;
use Modules\CustomResource;

class ProfileResource extends CustomResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function data(Request $request): array
    {
        return [
            'full_name' => $this->resource->full_name,
            'mobile_no' => $this->resource->mobile_no,
            'position' => $this->resource->position,
            'department' => $this->whenLoaded('department', fn () => $this->resource->department->name),
            'user' => $this->whenLoaded('user', fn () => $this->resource->user->email),
        ];
    }
}
