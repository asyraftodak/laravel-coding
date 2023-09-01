<?php

namespace Modules\Settings\Interfaces;

use Modules\Settings\DataTransferObjects\SettingDto;
use Modules\Settings\Models\Setting;
use Modules\Users\Models\User;

interface SettingServiceInterface
{
    public function store(User $user, SettingDto $dto): Setting;

    /**
     * @param  SettingDto[]  $settings
     * @return Setting[]
     */
    public function storeMany(User $user, array $settings): array;
}
