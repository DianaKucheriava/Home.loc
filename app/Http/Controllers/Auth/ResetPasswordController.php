<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
   use Illuminate\Support\Facades\Auth;
class ResetPasswordController extends Controller
{
    use ResetsPasswords;
    public function __construct()
    {
		$this->middleware('guest');
    }
	protected function guard()
	{
    return Auth::guard('guard-name');
	}
}
