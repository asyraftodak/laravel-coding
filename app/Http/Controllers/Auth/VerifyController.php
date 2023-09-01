<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerifyRequest;
use Modules\Auth\Verify\Interfaces\VerifyServiceInterface;
use Modules\Auth\Verify\Resources\VerifyResource;

class VerifyController extends Controller
{
    public function __construct(
        protected VerifyServiceInterface $service
    ) {
    }

    public function __invoke(VerifyRequest $request)
    {
        return VerifyResource::make(
            $this->service->verify(
                $request->validated('otp'),
                $request->validated('uuid')
            )
        );
    }
}
