<?php

/**
 * @OA\Info(title="GMD documentation", version="0.0.1")
 */

use Illuminate\Support\Facades\Route;

Route::get('/documentation', function () {
	return view("docs");
})->name('docs');

/**
 * @OA\Get(
 *     path="/",
 *     @OA\Response(response="200", description="Authorization page")
 * )
 */

Route::get('/', function () {
	if(Auth::check()){
		return redirect(route('private'));
	}
	return view('auth', ["page" => "auth"]);
})->name('auth');

/**
 * @OA\Get(
 *     path="/reg",
 *     @OA\Response(response="200", description="Registration page")
 * )
 */

Route::get('/reg', function () {
	if(Auth::check()){
		return redirect(route('private'));
	}
	return view('auth', ["page" => "reg"]);
})->name('reg');

/**
 * @OA\Get(
 *     path="/logout",
 *     @OA\Response(response="301", description="Logout page")
 * )
 */

Route::get('/logout', function () {
	Auth::logout();
	return redirect(route('auth'));
})->name('logout');

/**
 * @OA\Get(
 *     path="/private",
 *     @OA\Response(response="301", description="Main panel")
 * )
 */

Route::get('/private', function () {
	if(!Auth::check()){
		return redirect(route('auth'));
	}
	return view('private');
})->name('private');

Route::get('tasks/test', 'App\Http\Controllers\Controller@test');
Route::get('tasks/get', 'App\Http\Controllers\GetTaskController@list');
Route::get('tasks/remove', 'App\Http\Controllers\RemoveTaskController@remove');
Route::post('auth/login', 'App\Http\Controllers\LoginController@login');
Route::post('auth/register', 'App\Http\Controllers\RegisterController@save');
Route::post('tasks/post', 'App\Http\Controllers\PostTaskController@insert');
Route::post('tasks/edit', 'App\Http\Controllers\EditTaskController@update');
