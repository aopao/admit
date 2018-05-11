<?php
/*
|--------------------------------------------------------------------------
| Agent Routes
|--------------------------------------------------------------------------
*/
Auth::routes();
Route::namespace('Agent')->prefix('agent')->middleware('auth')->group(function() {
	Route::get('/' , 'DashboardController@index')->name('agent.index');
	## 学生管理路由##
	Route::resource('student' , 'DashboardController');
});