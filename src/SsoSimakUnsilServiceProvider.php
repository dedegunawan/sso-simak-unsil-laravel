<?php

namespace DedeGunawan\SsoSimakUnsilLaravel;

use Illuminate\Support\ServiceProvider;

class SsoSimakUnsilServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
	    $this->mergeConfigFrom(
		    __DIR__.'/../config.php', 'sso-simak-unsil-laravel'
	    );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
		$this->loadRoutesFrom(__DIR__.'/../routes.php');

	    $this->publishes([
		    __DIR__.'/../config.php' => config_path('sso-simak-unsil-laravel.php'),
	    ]);
    }
}
