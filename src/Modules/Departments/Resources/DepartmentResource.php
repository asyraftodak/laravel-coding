<?php

namespace Modules\Departments\Resources;

use Illuminate\Http\Request;
use Modules\CustomResource;

class DepartmentResource extends CustomResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function data(Request $request): array
    {
        return [
            'name' => $this->resource->name,
        ];
    }
}
