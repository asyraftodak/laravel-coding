<?php

namespace App\Http\Controllers;

use App\Http\Requests\Department\StoreManyRequest;
use App\Http\Requests\Department\StoreRequest;
use App\Http\Requests\Department\UpdateRequest;
use Modules\Departments\DataTransferObjects\DepartmentDto;
use Modules\Departments\Interfaces\DepartmentServiceInterface;
use Modules\Departments\Models\Department;
use Modules\Departments\Resources\DepartmentResource;

class DepartmentController extends Controller
{
    public function __construct(
        protected DepartmentServiceInterface $service
    ) {
    }

    public function index()
    {
        return DepartmentResource::collection(Department::paginate(1));
    }

    public function store(StoreRequest $request)
    {
        $department = $this->service->store(DepartmentDto::fromRequest($request));

        return DepartmentResource::make($department);
    }

    public function storeMany(StoreManyRequest $request)
    {
        $departments = $this->service->storeMany(
            array_map(
                fn (array $department) => DepartmentDto::fromArray($department),
                json_decode($request->validated('departments'), true)
            )
        );

        return DepartmentResource::collection($departments);
    }

    public function show(Department $department)
    {
        return DepartmentResource::make($department);
    }

    public function update(UpdateRequest $request, Department $department)
    {
        $department = $this->service->update(DepartmentDto::fromRequest($request), $department);

        return DepartmentResource::make($department);
    }
}
