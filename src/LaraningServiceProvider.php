<?php

namespace Waygou\Laraning;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class LaraningServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $this->publishAssets();

        $this->publishConfiguration();

        $this->registerCommands();

        $this->registerMigrations();

        $this->loadRoutes();

        $this->loadViews();

        $this->loadTranslations();
    }

    protected function registerMigrations()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }
    }

    protected function loadTranslations()
    {
        // Load translations example.
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laraning');
    }

    protected function loadViews()
    {
        // Load views example.
        $this->loadViewsFrom(
            __DIR__.'/../resources/views',
            'laraning'
        );
    }

    protected function publishConfiguration()
    {
        // Publish configuration.
        $this->publishes([
            __DIR__.'/../configuration/laraning.php' => config_path('laraning.php'),
        ], 'laraning-configuration');

        // Merge configuration example.
        $this->mergeConfigFrom(__DIR__.'/../configuration/laraning.php', 'laraning');
    }

    protected function loadRoutes()
    {
        // Load Routes example.
        Route::middleware(['web', 'csp'])
             ->namespace('\Waygou\Laraning\Http\Controllers')
             ->group(__DIR__.'/../routes/web.php');
    }

    protected function publishAssets()
    {
        // Resource publish example.
        $this->publishes([
            __DIR__.'/../resources/assets/' => public_path('vendor/laraning/'),
        ], 'laraning-resources');
    }

    protected function registerCommands()
    {
        // Command example.
        /*
        $this->commands([
            \Waygou\Laraning\Commands\CreateUserCommand::class,
        ]);
        */
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Middleware alias example.
        app('router')->aliasMiddleware('csp', \Spatie\Csp\AddCspHeaders::class);
    }
}
