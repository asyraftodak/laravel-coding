<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Modules\Auth\Login\Interfaces\LoginServiceInterface;
use Modules\Auth\Login\Services\LoginService;
use Modules\Auth\Verify\Interfaces\VerifyServiceInterface;
use Modules\Auth\Verify\Services\VerifyService;
use Modules\Departments\Interfaces\DepartmentServiceInterface;
use Modules\Departments\Services\DepartmentService;
use Modules\OneTimePasswords\Interfaces\OneTimePasswordServiceInterface;
use Modules\OneTimePasswords\Services\OneTimePasswordService;
use Modules\Organisations\Interfaces\OrganisationServiceInterface;
use Modules\Organisations\Services\OrganisationService;
use Modules\Profiles\Interfaces\ProfileServiceInterface;
use Modules\Profiles\Services\ProfileService;
use Modules\Settings\Interfaces\SettingServiceInterface;
use Modules\Settings\Services\SettingService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            SettingServiceInterface::class,
            SettingService::class
        );

        $this->app->bind(
            LoginServiceInterface::class,
            LoginService::class
        );

        $this->app->bind(
            VerifyServiceInterface::class,
            VerifyService::class
        );

        $this->app->bind(
            OrganisationServiceInterface::class,
            OrganisationService::class
        );

        $this->app->bind(
            DepartmentServiceInterface::class,
            DepartmentService::class
        );

        $this->app->bind(
            ProfileServiceInterface::class,
            ProfileService::class
        );

        $this->app->bind(
            OneTimePasswordServiceInterface::class,
            OneTimePasswordService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::shouldBeStrict(
            app()->isLocal()
        );
    }
}
