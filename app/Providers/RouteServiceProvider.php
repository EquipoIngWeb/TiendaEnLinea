<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
	/**
	 * This namespace is applied to your controller routes.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @return void
	 */
	public function boot()
	{
		//

		parent::boot();
	}

	/**
	 * Define the routes for the application.
	 *
	 * @return void
	 */
	public function map()
	{
		$this->mapApiRoutes();

		$this->mapWebRoutes();

		$this->mapUserRoutes();

		$this->mapAdminRoutes();


		//
	}

	/**
	 * Define the "web" routes for the application.
	 *
	 * These routes all receive session state, CSRF protection, etc.
	 *
	 * @return void
	 */
	protected function mapWebRoutes()
	{
		Route::group([
					 'middleware' => 'web',
					 'namespace' => $this->namespace,
					 ], function ($router) {
						require base_path('routes/web.php');
					 });
	}

	/**
	 * Define the "api" routes for the application.
	 *
	 * These routes are typically stateless.
	 *
	 * @return void
	 */
	protected function mapApiRoutes()
	{
		Route::group([
					 'middleware' => 'api',
					 'namespace' => $this->namespace,
					 'prefix' => 'api',
					 ], function ($router) {
						require base_path('routes/api.php');
					 });
	}

	/**
	 * Define the "user" routes for the application.
	 *
	 * These routes are typically stateless.
	 *
	 * @return void
	 */
	protected function mapUserRoutes()
	{
		Route::group([
					 'middleware' => 'user',
					 'namespace' => $this->namespace,
					 'prefix' => 'user',
					 ], function ($router) {
						require base_path('routes/user.php');
					 });
	}

	/**
	 * Define the "admin" routes for the application.
	 *
	 * These routes are typically stateless.
	 *
	 * @return void
	 */
	protected function mapAdminRoutes()
	{
		Route::group([
					 'middleware' => 'admin',
					 'namespace' => $this->namespace,
					 'prefix' => 'admin',
					 ], function ($router) {
						require base_path('routes/admin.php');
					 });
	}
}
