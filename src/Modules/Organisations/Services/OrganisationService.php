<?php

namespace Modules\Organisations\Services;

use Modules\Organisations\DataTransferObjects\OrganisationDto;
use Modules\Organisations\Interfaces\OrganisationServiceInterface;
use Modules\Organisations\Models\Organisation;

class OrganisationService implements OrganisationServiceInterface
{
    public function update(OrganisationDto $dto): Organisation
    {
        /** @var Organisation */
        $organisation = Organisation::updateOrCreate([
            'id' => 1,
        ], [
            'name' => $dto->name,
            'address' => $dto->address,
            'lon' => $dto->lon,
            'lat' => $dto->lat,
        ]);

        return $organisation;
    }
}
