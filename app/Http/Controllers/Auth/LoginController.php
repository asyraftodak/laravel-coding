<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Modules\Auth\Enums\LoginMode;
use Modules\Auth\Login\Interfaces\LoginServiceInterface;
use Modules\Auth\Login\Resources\LoginResource;

class LoginController extends Controller
{
    public function __construct(
        protected LoginServiceInterface $service
    ) {
    }

    public function __invoke(LoginRequest $request)
    {
        return LoginResource::make(
            $this->service->login(
                $request->validated('email') ?: $request->validated('mobile_no'),
                LoginMode::from($request->validated('mode'))
            )
        );
    }
}
