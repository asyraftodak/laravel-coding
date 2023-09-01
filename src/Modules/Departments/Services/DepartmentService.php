<?php

namespace Modules\Departments\Services;

use Modules\Departments\DataTransferObjects\DepartmentDto;
use Modules\Departments\Interfaces\DepartmentServiceInterface;
use Modules\Departments\Models\Department;

class DepartmentService implements DepartmentServiceInterface
{
    public function store(DepartmentDto $dto): Department
    {
        /** @var Department */
        return Department::updateOrCreate([
            'name' => $dto->name,
        ], [
            'name' => $dto->name,
        ]);
    }

    public function storeMany(array $departments): array
    {
        $output = [];

        foreach ($departments as $department) {
            $output[] = $this->store($department);
        }

        return $output;
    }

    public function update(DepartmentDto $dto, Department $department): Department
    {
        $department->update([
            'name' => $dto->name,
        ]);

        return $department;
    }
}
