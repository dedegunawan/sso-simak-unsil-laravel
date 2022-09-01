<?php
Route::get('/cek-user-simak', [\App\Http\Controllers\CekUserSimakController::class, 'index'])
	->middleware(\DedeGunawan\SsoSimakUnsilLaravel\Middlewares\AuthSimakMiddleware::class);

