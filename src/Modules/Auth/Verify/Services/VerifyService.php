<?php

namespace Modules\Auth\Verify\Services;

use Modules\Auth\Verify\Interfaces\VerifyServiceInterface;
use Modules\OneTimePasswords\Interfaces\OneTimePasswordServiceInterface;
use Modules\Users\Models\User;

class VerifyService implements VerifyServiceInterface
{
    public function __construct(
        protected OneTimePasswordServiceInterface $service
    ) {
    }

    public function verify(string $otp, string $uuid): User
    {
        /** @var User */
        $user = User::getUserByUuid($uuid)->first();

        return $this->service->verifyOneTimePassword($otp, $user);
    }
}
