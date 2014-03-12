<?php namespace Saas\Devtracker;

use Illuminate\Support\ServiceProvider;

class DevtrackerServiceProvider extends ServiceProvider {

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
		$this->package('saas/devtracker');
		require_once __DIR__ . '/../../routes.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app['devtracker'] = $this->app->share(function($app)
        {
            return new Devtracker;
        });
        $this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Devtracker', 'Saas\Devtracker\Facades\Devtracker');
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('devtracker');
	}


}
