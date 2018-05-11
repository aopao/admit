<?php
/**
 * 后台管理路由
 */
##获取管理后台路径前缀##
define('PREFIX' , config('admin.admin_prfix'));

##后台登录处理##
Route::namespace('Admin')->prefix(PREFIX)->group(function() {
	Route::get('/login' , 'LoginController@showLoginForm')->name('admin.login');
	Route::post('/login' , 'LoginController@login');
});

##后台具体业务路由##
Route::namespace('Admin')->prefix(PREFIX)->middleware('auth')->group(function() {
	##后台首页路由##
	Route::get('/' , 'DashboardController@index')->name('admin.index');
	Route::get('dashboard' , 'DashboardController@index')->name('admin.index');
//	Route::resource('user', 'AdminUserController', ['parameters' => [
//		'user' => 'admin_user'
//	]]);
	##学生管理路由##
	Route::resource('student' , 'StudentController' , [ 'as' => 'admin' ]);
//
//	## 学生管理路由##
//	Route::prefix('student')->group(function() {
//		Route::get('pro_search' , 'StudentController@proSearch')->name('admin.student.pro_search');
//		##学生方案管理路由##
//		Route::get('{id}/plan/{type_id}' , 'PlanController@index')->name('admin.plane.index');
//		Route::post('{id}/plan/{type_id}/cretae' , 'PlanController@create')->name('admin.plane.cretae');
//		Route::get('{id}/plan/{plan_id}/detail' , 'PlanDetailController@index')->name('admin.plane.detail');
//		Route::get('{id}/plan/{plan_id}/detail/create' , 'PlanDetailController@create')->name('admin.plane.detail.create');
//		Route::get('{id}/plan/{plan_id}/detail/search' , 'PlanDetailController@search')->name('admin.plane.detail.search');
//
//	});
//
//	##学生方案类型管理路由##
//	Route::resource('type' , 'TypeController' , [ 'as' => 'admin' ]);
//
//	## 用户管理路由##
//	Route::get('change_status' , 'UserController@changeStatus')->name('admin.user.change_status');
//	Route::resource('user' , 'UserController');
//
//	##地区三级联动##
//	Route::get('/regin/link' , 'ReginController@threeLink')->name('admin.region.link');
//	Route::get('/regin/city' , 'ReginController@getCityById')->name('admin.region.city');
//	Route::get('/regin/area' , 'ReginController@getAreaById')->name('admin.region.area');
});