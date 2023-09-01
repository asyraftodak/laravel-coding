<?php

namespace Modules\Organisations\Models;

use Database\Factories\OrganisationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CustomModel;
use Modules\Organisations\Builders\OrganisationQueryBuilder;

class Organisation extends CustomModel
{
    use HasFactory;

    protected $guarded = [];

    public function newEloquentBuilder($query): OrganisationQueryBuilder
    {
        return new OrganisationQueryBuilder($query);
    }

    public static function newFactory()
    {

        return OrganisationFactory::new();
    }
}
