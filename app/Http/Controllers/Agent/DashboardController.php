<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Admin\BaseController;

class DashboardController extends BaseController
{
	public function index()
	{
		return view('agents.dashboard.dashboard');
	}
}
