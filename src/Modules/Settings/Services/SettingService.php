<?php

namespace Modules\Settings\Services;

use Modules\Settings\DataTransferObjects\SettingDto;
use Modules\Settings\Exceptions\SettingException;
use Modules\Settings\Interfaces\SettingServiceInterface;
use Modules\Settings\Models\Setting;
use Modules\Users\Models\User;

class SettingService implements SettingServiceInterface
{
    public function store(User $user, SettingDto $dto): Setting
    {
        if (! $dto->value) {
            throw SettingException::noValueProvided();
        }

        /** @var Setting */
        return Setting::updateOrCreate([
            'user_id' => $user->id,
            'type' => $dto->value,
        ], [
            'value' => $dto->value,
        ]);
    }

    /**
     * @param  SettingDto[]  $settings
     */
    public function storeMany(User $user, array $settings): array
    {
        $outpot = [];
        foreach ($settings as $setting) {
            $output[] = $this->store($user, $setting);
        }

        return $outpot;
    }
}
