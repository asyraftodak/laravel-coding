<?php

namespace Modules\Departments\DataTransferObjects;

use App\Http\Requests\Department\StoreRequest;
use App\Http\Requests\Department\UpdateRequest;

readonly class DepartmentDto
{
    public function __construct(
        public string $name,
    ) {
    }

    public static function fromRequest(StoreRequest|UpdateRequest $request): self
    {
        return new self(
            $request->validated('name'),
        );
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
        );
    }
}
