<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class RegisterController extends Controller {

	public function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function save(Request $request){

		$validateFields = $request->validate([
			'login' => 'required|unique:users|max:255',
			'role' => 'required|max:255',
			'password' => 'required'
		]);

		$validateFields['hash'] = $this->generateRandomString();

		if(User::where('login', $validateFields['login'])->exists()){
			return redirect(route('reg'))->withErrors([
				'formError' => 'User exists'
			]);
		}

		$user = User::create($validateFields);
		if($user){
			Auth::login($user);
			return redirect()->to(route('private'));
		}

		return redirect(route('reg'))->withErrors([
			'formError' => 'Error occurred'
		]);

	}
	
}
