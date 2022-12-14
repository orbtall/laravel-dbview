<?php namespace Orbtall\DbBladeCompiler;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Engines\CompilerEngine;

class DbBladeCompilerServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $config_path = __DIR__ . '/../../../config/dbview.php';
        $this->publishes([$config_path => config_path('dbview.php')], 'config');

        $views_path = __DIR__ . '/../../../config/.gitkeep';
        $this->publishes([$views_path => storage_path('app/dbview/views/.gitkeep')]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $config_path = __DIR__ . '/../../../config/dbview.php';
        $this->mergeConfigFrom($config_path, 'dbview');

        $this->app->singleton(DbView::class);

        $this->app->alias(DbView::class, 'dbview');

        $this->app->bind(DbBladeCompiler::class, function($app) {
            $cache_path = storage_path('app/dbview/views');

            return new DbBladeCompiler($app['files'], $cache_path, $app['config']);
        });

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

}
