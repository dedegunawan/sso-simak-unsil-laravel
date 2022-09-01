<?php

namespace DedeGunawan\SsoSimakUnsilLaravel\Controllers;

use DedeGunawan\SsoSimakUnsilLaravel\Helpers\SsoSimakHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CallbackController extends Controller
{
	public function __construct()
	{
		SsoSimakHelper::setupSso(
			config('sso-simak-unsil-laravel.simak-app-id'),
			config('sso-simak-unsil-laravel.simak-client-id'),
		);
	}

	public function index(Request $request)
    {
        $token = $request->input('token');
        if (!$token) {
            return redirect(SsoSimakHelper::loginUrlSimak());
        }
        $last_url = $request->input('last_url');
        if (!$last_url) $last_url = "dashboard";

        $user = SsoSimakHelper::getInstance()->loginToken($token);
        if ($user) return redirect($last_url);
        $exception = SsoSimakHelper::getInstance()->getException();
        $message = $exception->getMessage();
        if (
            !$user
            && in_array($message, ['Expired token', 'User sudah logout.'])
        ) {
            return SsoSimakHelper::getInstance()->generateLoginUrl();
        }
        return abort(403, $message);

    }

    public function login(Request $request) {
        $last_url = $request->input('last_url');
        if (
            $last_url == "/sso-callback"
            || $last_url == "sso-callback"
        ) $last_url = "dashboard";

        return redirect(
            SsoSimakHelper::loginUrlSimak($last_url)
        );
    }
}
