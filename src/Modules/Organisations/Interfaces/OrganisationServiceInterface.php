<?php

namespace Modules\Organisations\Interfaces;

use Modules\Organisations\Models\Organisation;
use Modules\Organisations\DataTransferObjects\OrganisationDto;

interface OrganisationServiceInterface
{
    public function update(OrganisationDto $dto): Organisation;
}
