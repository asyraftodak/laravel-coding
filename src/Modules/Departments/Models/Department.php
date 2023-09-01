<?php

namespace Modules\Departments\Models;

use Database\Factories\DepartmentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CustomModel;
use Modules\Departments\Builders\DepartmentQueryBuilder;

class Department extends CustomModel
{
    use HasFactory;

    protected $guarded = [];

    public function newEloquentBuilder($query): DepartmentQueryBuilder
    {
        return new DepartmentQueryBuilder($query);
    }

    public static function newFactory()
    {
        return DepartmentFactory::new();
    }
}
