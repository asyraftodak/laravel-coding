<?php

namespace Modules\Settings\Resources;

use Illuminate\Http\Request;
use Modules\CustomResource;

/**
 * @property \Modules\Settings\Models\Setting $resource
 */
class SettingResource extends CustomResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function data(Request $request): array
    {
        return [
            'type' => $this->resource->type,
        ];
    }
}
