<?php

namespace Modules\Organisations\DataTransferObjects;

use App\Http\Requests\OrganisationRequest;

readonly class OrganisationDto
{
    public function __construct(
        public string $name,
        public string $address,
        public float $lon,
        public float $lat,
    ) {
    }

    public static function fromRequest(OrganisationRequest $request): self
    {
        return new self(
            name: $request->validated('name'),
            address: $request->validated('address'),
            lon: $request->validated('lon'),
            lat: $request->validated('lat'),
        );
    }
}
