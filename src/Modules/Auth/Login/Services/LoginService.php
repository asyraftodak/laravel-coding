<?php

namespace Modules\Auth\Login\Services;

use App\Models\User;
use Modules\Auth\Login\Interfaces\LoginServiceInterface;

class LoginService implements LoginServiceInterface
{
    public function login(string $email): User
    {
        return User::where('email', $email)->first();
    }
}
