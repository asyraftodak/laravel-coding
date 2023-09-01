<?php

namespace Modules\Profiles\DataTransferObjects;

use App\Http\Requests\Profile\StoreRequest;
use App\Http\Requests\Profile\UpdateRequest;

readonly class ProfileDto
{
    public function __construct(
        public string|null $user_id,
        public string $mobile_no,
        public string $department_id,
        public string $position,
        public string $full_name,
    ) {
    }

    public static function fromRequest(StoreRequest|UpdateRequest $request): self
    {
        return new self(
            $request->validated('user_id') ?: null,
            $request->validated('mobile_no'),
            $request->validated('department_id'),
            $request->validated('position'),
            $request->validated('full_name'),
        );
    }
}
