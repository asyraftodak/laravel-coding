<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Modules\Departments\Interfaces\DepartmentServiceInterface;
use Modules\Departments\Services\DepartmentService;
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
            DepartmentServiceInterface::class,
            DepartmentService::class
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
