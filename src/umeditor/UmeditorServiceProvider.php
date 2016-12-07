<?php namespace Hinet\Umeditor;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class UmeditorServiceProvider extends ServiceProvider {

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
		$this->publishes([
		    __DIR__.'/../config/config.php' => config_path('umeditor.php'),
		], 'umeditor');
		$this->publishes([
		    __DIR__ . '/../../public' => public_path('assets/umeditor'),
		], 'umeditor');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		Route::group(['namespace'=>'Hinet\Umeditor\Controller'],function(){
            Route::post('/umeditor/imageUp', 'UmeditorImageController@upload');
            Route::get('/umeditor.config.js', [
                'as' => 'umeditor.config',
                'uses' => 'UmeditorImageController@config'
            ]);
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
