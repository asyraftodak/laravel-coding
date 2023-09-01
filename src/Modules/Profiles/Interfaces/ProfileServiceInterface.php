<?php

namespace Modules\Profiles\Interfaces;

use Modules\Profiles\DataTransferObjects\ProfileDto;
use Modules\Profiles\Models\Profile;

interface ProfileServiceInterface
{
    public function store(ProfileDto $dto): Profile;

    public function update(ProfileDto $dto, Profile $profile): Profile;
}
