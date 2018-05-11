<?php
/*
|--------------------------------------------------------------------------
| Agent Routes
|--------------------------------------------------------------------------
*/
Auth::routes();
Route::get('/home' , 'HomeController@index')->name('home');

Route::get('/agent' , 'Agent\DashboardController@index');