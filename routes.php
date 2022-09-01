<?php
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
	Route::get('/sso-callback', [
		\DedeGunawan\SsoSimakUnsilLaravel\Controllers\CallbackController::class,
		'index'
	])->name('sso-callback');


	Route::get('/sso-login', [
		\DedeGunawan\SsoSimakUnsilLaravel\Controllers\CallbackController::class,
		'login'
	])->name('sso-login');
});
