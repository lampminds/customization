<?php

namespace Lampminds\Customization;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Filament\Panel;
use Filament\PanelProvider;
use Illuminate\Support\Facades\Gate;

class CustomizationServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('lmpcustomization')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigrations();
    }

    public function boot(): void
    {
        parent::boot();

        // Register Filament resources if enabled in config
        $this->registerFilamentResources();
        
        // Register model bindings
        $this->registerModelBindings();
        
        // Register gates and policies
        $this->registerGates();
    }

    public function register(): void
    {
        parent::register();
        
        $this->mergeConfigFrom(
            __DIR__.'/config/lmpcustomization.php', 
            'lmpcustomization'
        );
    }

    protected function registerFilamentResources(): void
    {
        if (!$this->app->bound('filament')) {
            return;
        }

        // Get the configuration
        $config = config('lmpcustomization', []);
        
        // Register resources based on configuration
        if ($config['enable_user_resource'] ?? true) {
            $this->app->afterResolving(Panel::class, function (Panel $panel) {
                if ($panel->getId() === ($config['panel_id'] ?? 'admin')) {
                    $panel->resources([
                        \Lampminds\Customization\Resources\UserResource::class,
                    ]);
                }
            });
        }

        if ($config['enable_parameter_resource'] ?? true) {
            $this->app->afterResolving(Panel::class, function (Panel $panel) {
                if ($panel->getId() === ($config['panel_id'] ?? 'admin')) {
                    $panel->resources([
                        \Lampminds\Customization\Resources\ParameterResource::class,
                    ]);
                }
            });
        }
    }

    protected function registerModelBindings(): void
    {
        $config = config('lmpcustomization', []);
        
        // Allow customization of model classes
        if ($userModel = $config['user_model'] ?? null) {
            $this->app->bind(\Lampminds\Customization\Models\User::class, $userModel);
        }
        
        if ($parameterModel = $config['parameter_model'] ?? null) {
            $this->app->bind(\Lampminds\Customization\Models\Parameter::class, $parameterModel);
        }
    }

    protected function registerGates(): void
    {
        // Register custom gates for the package
        Gate::define('manage-parameters', function ($user) {
            return $user->canManageParameters();
        });
        
        Gate::define('manage-users', function ($user) {
            return $user->isAdmin();
        });
    }
}

