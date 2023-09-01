<?php

namespace Modules\Departments\Interfaces;

use Modules\Departments\DataTransferObjects\DepartmentDto;
use Modules\Departments\Models\Department;

interface DepartmentServiceInterface
{
    public function store(DepartmentDto $dto): Department;

    /**
     * @param  DepartmentDto[]  $departments
     * @return Department[]
     */
    public function storeMany(array $departments): array;

    public function update(DepartmentDto $dto, Department $department): Department;
}
