<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

///////////////////////////////////////////////////////////////////////////////////////////
// AUTHENTICATION
///////////////////////////////////////////////////////////////////////////////////////////

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::prefix('password')->group(function () {
    // Form for the user to enter their email and request a password reset
    Route::get('/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

    // Email user with password reset link
    Route::post('/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    // Password reset Form
    Route::get('/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

    // Password reset post data
    Route::post('/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
});
