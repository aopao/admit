<?php

namespace App\Http\Controllers\Agent;

use Auth;
use App\Http\Controllers\Controller;

/**
 * Class BaseController
 * @package App\Http\Controllers\Admin
 */
class BaseController extends Controller
{

	/**
	 * BaseController constructor.
	 */
	public function __construct()
	{
		##判断登录用户是否是管理员##
		$this->middleware(function($request , $next) {
			if (!Auth::check() || Auth::user()->is_admin == 1) {
				return redirect(route('admin.index'));
			}
			return $next($request);
		});
	}
}