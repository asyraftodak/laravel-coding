<?php

namespace Modules\Teams\Models;

use Database\Factories\TeamFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CustomModel;
use Modules\Teams\Builders\TeamQueryBuilder;

class Team extends CustomModel
{
    use HasFactory;

    public function newEloquentBuilder($query): TeamQueryBuilder
    {
        return new TeamQueryBuilder($query);
    }

    public static function newFactory(): TeamFactory
    {
        // TODO: implement
        return TeamFactory::new();
    }
}
