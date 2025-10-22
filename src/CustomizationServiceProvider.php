<?php

namespace Lampminds\Customization;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CustomizationServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        //
    }

    public function boot(): void
    {
        // Load migrations from the package
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        // load config file
        $this->publishes([
            __DIR__.'/config/lmpcustomization.php' => config_path('lmpcustomization.php'),
        ], 'lmpcustomization-config');

        // Load views from the package
        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/lmpcustomization'),
        ], 'lmpcustomization-views');

        // Allow developers to publish them
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../database/migrations' => database_path('migrations'),
            ], 'lmpcustomization-migrations');
        }
    }

    public function register(): void
    {
        //
    }
}

