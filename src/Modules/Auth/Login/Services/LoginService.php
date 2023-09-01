<?php

namespace Modules\Auth\Login\Services;

use Modules\Auth\Enums\LoginMode;
use Modules\Auth\Login\Interfaces\LoginServiceInterface;
use Modules\OneTimePasswords\Interfaces\OneTimePasswordServiceInterface;
use Modules\Users\Models\User;

class LoginService implements LoginServiceInterface
{
    public function __construct(
        protected OneTimePasswordServiceInterface $service
    ) {
    }

    public function login(string $value, LoginMode $mode): User
    {
        /** @var User */
        $user = User::getUserAtLogin($value, $mode)->first();

        $otp = $this->service->generateOneTimePassword($user);

        $this->service->sendOneTimePassword(
            $otp,
            LoginMode::from($mode->value),
            $user
        );

        return $user;
    }
}
