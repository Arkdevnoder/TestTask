<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller {
	public function login(Request $request){
		$formFields = $request->only(['login', 'password']);

		if(Auth::attempt($formFields)){
			return redirect()->intended(route('private'));
		}

		return redirect(route('auth'))->withErrors([
			'formError' => 'Your login or password are wrong'
		]);
	}
}
