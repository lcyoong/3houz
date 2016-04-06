<?php

namespace Lcyoong\Lcgallery;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class LcgalleryServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // use this if your package has views
        $this->loadViewsFrom(realpath(__DIR__.'/resources/views'), 'lcgallery');
        
        // use this if your package has routes
        $this->setupRoutes($this->app->router);
        
        // use this if your package needs a config file
        $this->publishes([
                __DIR__.'/config/lcgallery.php' => config_path('lcgallery.php'),
        ], 'config');
		
        $this->publishes([
                __DIR__ . '/public/js' => public_path('js/lcyoong/lcgallery'),
                __DIR__ . '/public/css' => public_path('css/lcyoong/lcgallery')
        ], 'public');

        $this->publishes([
                __DIR__ . '../database/migrations/' => database_path('migrations'),
        ], 'migrations');
        
        $this->loadTranslationsFrom(__DIR__.'/lang', 'lcgallery');
        // use the vendor configuration file as fallback
        // $this->mergeConfigFrom(
        //     __DIR__.'/config/config.php', 'skeleton'
        // );
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        $router->group(['namespace' => 'Lcyoong\Lcgallery\Http\Controllers'], function($router)
        {
            require __DIR__.'/Http/routes.php';
        });
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerLcgallery();
        
        // use this if your package has a config file
        // config([
        //         'config/skeleton.php',
        // ]);
    }

    private function registerLcgallery()
    {
        $this->app->bind('lcgallery',function($app){
            return new Lcgallery($app);
        });
    }
}