<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::resource('sessions', 'SessionsController');

Route::post('signup', 'Users@create');

Route::resource('users', 'UsersController');

Route::get('/', array('as' => 'home', function () { 
	return View::make('home');
})) ;

Route::get('login', array('as' => 'login', function () { 
	return View::make('login');
}));

Route::get('signup', array('as' => 'signup', function () { 
    return View::make('signup');
}));

Route::get('signup/step2', array('as' => 'step2', function () { 
    return View::make('step2');
}));

Route::get('logout', array('as' => 'logout', function () { 
	Auth::logout();
	return Redirect::route('home');
}));

Route::get('profile', array('before' => 'auth', 'do' => function () { 
	return View::make('profile');
}));