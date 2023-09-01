<?php

namespace Modules\Auth\Login\Interfaces;

use Modules\Auth\Enums\LoginMode;
use Modules\Users\Models\User;

interface LoginServiceInterface
{
    public function login(string $email, LoginMode $mode): User;
}
