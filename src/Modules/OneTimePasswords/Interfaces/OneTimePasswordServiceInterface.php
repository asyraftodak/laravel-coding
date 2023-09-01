<?php

namespace Modules\OneTimePasswords\Interfaces;

use Modules\Auth\Enums\LoginMode;
use Modules\OneTimePasswords\Models\OneTimePassword;
use Modules\Users\Models\User;

interface OneTimePasswordServiceInterface
{
    public function generateOneTimePassword(User $user): OneTimePassword;

    public function sendOneTimePassword(OneTimePassword $otp, LoginMode $mode, User $user): void;

    public function verifyOneTimePassword(string $otp, User $user): User;
}
