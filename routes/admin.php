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

	/** 学生管理路由 **/
	Route::resource('student' , 'StudentController' , [ 'as' => 'admin' ]);

	/** 学生管理路由 **/
	Route::prefix('student')->group(function() {
		##学生方案管理路由##
		Route::get('{student_id}/plan/{plan_id}' , 'StudentPlanController@index')->name('admin.plan.index');
		Route::post('{student_id}/plan/{plan_id}/create' , 'StudentPlanController@create')->name('admin.plan.create');
		Route::get('{student_id}/plan/show/{plan_model_id}' , 'StudentPlanController@show')->name('admin.plan.show');
		Route::get('{student_id}/plan/edit/{plan_model_id}' , 'StudentPlanController@edit')->name('admin.plan.edit');
		Route::post('{student_id}/plan/update/{plan_model_id}' , 'StudentPlanController@update')->name('admin.plan.update');
		Route::get('{student_id}/plan/destroy/{plan_model_id}' , 'StudentPlanController@destroy')->name('admin.plan.destroy');
		Route::get('{student_id}/plan/{plan_model_id}/search' , 'StudentPlanController@search')->name('admin.plan.search');
		Route::get('{student_id}/plan/{plan_model_id}/searchKnowScore' , 'StudentPlanController@searchKnowScore')->name('admin.plan.searchKnowScore');
		Route::get('{student_id}/plan/{plan_model_id}/add_plan' , 'StudentPlanController@addPlan')->name('admin.plan.add');

	});

	/** 学生管理路由 **/
	Route::resource('college' , 'CollegeController' , [ 'as' => 'admin' ]);

	/** Mongo To Mysql路由 **/
	Route::get('/mongo/' , 'TranformMongoToMysqlController@index')->name('mongo.index');
	Route::get('/mongo/mm' , 'TranformMongoToMysqlController@mm')->name('mongo.mm');
	Route::get('/mongo/college' , 'TranformMongoToMysqlController@collegeToMysql')->name('mongo.college');
	Route::get('/mongo/category' , 'TranformMongoToMysqlController@collegeCategoryToMysql')->name('mongo.category');
	Route::get('/mongo/category_to_mongo' , 'TranformMongoToMysqlController@collegeCategoryMysqlToMongo')->name('mongo.college_to');
	Route::get('/mongo/admit' , 'TranformMongoToMysqlController@admitToMysql')->name('mongo.admit');


//	## 用户管理路由##
//	Route::get('change_status' , 'UserController@changeStatus')->name('admin.user.change_status');
//	Route::resource('user' , 'UserController');
//
//	##地区三级联动##
//	Route::get('/regin/link' , 'ReginController@threeLink')->name('admin.region.link');
//	Route::get('/regin/city' , 'ReginController@getCityById')->name('admin.region.city');
//	Route::get('/regin/area' , 'ReginController@getAreaById')->name('admin.region.area');
});