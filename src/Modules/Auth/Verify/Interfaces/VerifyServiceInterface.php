<?php

namespace Modules\Auth\Verify\Interfaces;

use Modules\Users\Models\User;

interface VerifyServiceInterface
{
    public function verify(string $otp, string $uuid): User;
}
