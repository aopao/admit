<?php

namespace App\Http\Controllers\Agent;

class DashboardController extends BaseController
{
	public function index()
	{
		return view('agents.dashboard.dashboard');
	}
}
