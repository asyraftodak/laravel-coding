<?php

namespace Modules;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;

abstract class CustomAuthenticatable extends Authenticatable
{
    public function newEloquentBuilder($query): Builder
    {
        throw new \LogicException(sprintf('Model %s must defined `newEloquentBuilder', get_class()));
    }
}
