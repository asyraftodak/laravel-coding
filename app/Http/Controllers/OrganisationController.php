<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganisationRequest;
use Modules\Organisations\DataTransferObjects\OrganisationDto;
use Modules\Organisations\Interfaces\OrganisationServiceInterface;
use Modules\Organisations\Models\Organisation;
use Modules\Organisations\Resources\OrganisationResource;

class OrganisationController extends Controller
{
    public function __construct(
        public OrganisationServiceInterface $service
    ) {
    }

    public function show()
    {
        return OrganisationResource::make(Organisation::getOrganisation());
    }

    public function update(OrganisationRequest $request): OrganisationResource
    {
        // dd($request->validated());
        return OrganisationResource::make(
            $this->service->update(
                OrganisationDto::fromRequest($request)
            )
        );
    }
}
