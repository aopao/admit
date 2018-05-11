<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;

class RedirectController extends Controller
{
	public function index()
	{
		if (Auth::check() && Auth::user()->is_manage == 1) {
			return redirect(route('admin.index'));
		} else {
			return redirect(route('agent.index'));
		}
	}
}
