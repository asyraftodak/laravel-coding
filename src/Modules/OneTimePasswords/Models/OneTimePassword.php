<?php

namespace Modules\OneTimePasswords\Models;

use Database\Factories\OneTimePasswordFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CustomModel;
use Modules\OneTimePasswords\Builders\OneTimePasswordQueryBuilder;

class OneTimePassword extends CustomModel
{
    use HasFactory;

    protected $guarded = [];

    public function newEloquentBuilder($query): OneTimePasswordQueryBuilder
    {
        return new OneTimePasswordQueryBuilder($query);
    }

    public static function newFactory()
    {

        return OneTimePasswordFactory::new();
    }
}
