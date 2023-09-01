<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingStoreRequest;
use Modules\Settings\DataTransferObjects\SettingDto;
use Modules\Settings\Interfaces\SettingServiceInterface;
use Modules\Settings\Resources\SettingResource;

class SettingController extends Controller
{
    public function __construct(
        protected SettingServiceInterface $service
    ) {
    }

    public function store(SettingStoreRequest $request): SettingResource
    {
        $setting = $this->service->store(
            user: $request->user(),
            dto: SettingDto::fromRequest($request)
        );

        return SettingResource::make($setting);
    }
}
