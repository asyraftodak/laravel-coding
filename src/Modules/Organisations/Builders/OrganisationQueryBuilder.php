<?php

namespace Modules\Organisations\Builders;

use Illuminate\Database\Eloquent\Builder;

class OrganisationQueryBuilder extends Builder
{
    public function getOrganisation(): self
    {
        return $this->where('id', 1);
    }
}
