<?php

namespace Modules\Profiles\Services;

use Modules\Profiles\DataTransferObjects\ProfileDto;
use Modules\Profiles\Interfaces\ProfileServiceInterface;
use Modules\Profiles\Models\Profile;

class ProfileService implements ProfileServiceInterface
{
    public function store(ProfileDto $dto): Profile
    {
        /** @var Profile */
        $profile = Profile::firstOrCreate([
            'user_id' => $dto->user_id,
        ], [
            'department_id' => $dto->department_id,
            'mobile_no' => $dto->mobile_no,
            'position' => $dto->position,
            'full_name' => $dto->full_name,
        ]);

        return $profile;
    }

    public function update(ProfileDto $dto, Profile $profile): Profile
    {
        $profile->update([
            'department_id' => $dto->department_id,
            'mobile_no' => $dto->mobile_no,
            'position' => $dto->position,
            'full_name' => $dto->full_name,
        ]);

        return $profile;
    }
}
