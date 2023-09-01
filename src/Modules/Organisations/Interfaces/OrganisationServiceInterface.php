<?php

namespace Modules\Organisations\Interfaces;

use Modules\Organisations\DataTransferObjects\OrganisationDto;
use Modules\Organisations\Models\Organisation;

interface OrganisationServiceInterface
{
    public function update(OrganisationDto $dto): Organisation;
}
