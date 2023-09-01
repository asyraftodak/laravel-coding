<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\StoreRequest;
use App\Http\Requests\Profile\UpdateRequest;
use Modules\Profiles\DataTransferObjects\ProfileDto;
use Modules\Profiles\Interfaces\ProfileServiceInterface;
use Modules\Profiles\Models\Profile;
use Modules\Profiles\Resources\ProfileResource;

class ProfileController extends Controller
{
    public function __construct(
        protected ProfileServiceInterface $service
    ) {
    }

    public function show(Profile $profile)
    {
        return ProfileResource::make(
            $profile
        );
    }

    public function store(StoreRequest $request)
    {
        return ProfileResource::make(
            $this->service->store(
                ProfileDto::fromRequest($request)
            )
        );
    }

    public function update(UpdateRequest $request, Profile $profile)
    {
        return ProfileResource::make(
            $this->service->update(
                ProfileDto::fromRequest($request),
                $profile
            )
        );
    }
}
