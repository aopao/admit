<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\CollegeRepository;
use Illuminate\Http\Request;

class CollegeController extends BaseController
{
	private $college;

	public function __construct(CollegeRepository $collegeRepository)
	{
		parent::__construct();
		$this->college = $collegeRepository;
	}

	public function index(Request $request)
	{
		$key = $request->input('key');
		if (isset($key)) {
			$college_list = $this->college->getAllByQuery($key);
		} else {
			$college_list = $this->college->getAll();
		}
		return view('admins.college.index' , compact('college_list' , 'key'));
	}
}
