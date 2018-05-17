<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\CollegeRepository;
use Illuminate\Http\Request;

/**
 * Class CollegeController
 * @package App\Http\Controllers\Admin
 */
class CollegeController extends BaseController
{
	/**
	 * @var CollegeRepository
	 */
	private $college;

	/**
	 * CollegeController constructor.
	 * @param CollegeRepository $collegeRepository
	 */
	public function __construct(CollegeRepository $collegeRepository)
	{
		parent::__construct();
		$this->college = $collegeRepository;
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
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

	/**
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function create()
	{
		return redirect(route('admin.college'));
	}

	/**
	 * @param $collge_id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($collge_id)
	{
		$college_info = $this->college->getById($collge_id);
		return view('admins.college.show' , compact('college_info'));
	}
}
