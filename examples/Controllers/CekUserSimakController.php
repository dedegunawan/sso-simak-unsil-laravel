<?php

namespace App\Http\Controllers;

use DedeGunawan\SsoSimakUnsilLaravel\Helpers\SsoSimakHelper;
use Illuminate\Http\Request;

class CekUserSimakController extends Controller
{
    public function index()
    {
		$user = SsoSimakHelper::getInstance()->getUser();
		return $user['Login'];
    }
}
