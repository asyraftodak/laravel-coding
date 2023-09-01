<?php

namespace Modules\Auth\Login\Interfaces;

use App\Models\User;

interface LoginServiceInterface
{
    public function login(string $email): User;
}
