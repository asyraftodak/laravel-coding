<?php

namespace Modules\Organisations\Resources;

use Illuminate\Http\Request;
use Modules\CustomResource;

class OrganisationResource extends CustomResource
{
    public function data(Request $request): array
    {
        return [
            'name' => $this->resource->name,
            'address' => $this->resource->address,
            'lon' => $this->resource->lon,
            'lat' => $this->resource->lat,
        ];
    }
}
