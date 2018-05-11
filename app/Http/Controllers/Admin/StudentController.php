<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Repositories\StudentRepository;
use App\Repositories\ProvinceRepository;

class StudentController extends BaseController
{
	private $student;

	public function __construct(StudentRepository $studentRepository)
	{
		parent::__construct();
		$this->student = $studentRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$key = $request->input('key');
		if (isset($key)) {
			$student_list = $this->student->getAllByQuery($key);
		} else {
			$student_list = $this->student->getAll();
		}

		return view('admins.student.index' , compact('student_list'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param ProvinceRepository $provinceRepository
	 * @return \Illuminate\Http\Response
	 */
	public function create(ProvinceRepository $provinceRepository)
	{
		# 获取省份列表
		$province_list = $provinceRepository->getAll();
		return view('admins.student.create' , compact('province_list'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param StudentRequest $studentRequest
	 * @return void
	 */
	public function store(StudentRequest $studentRequest)
	{
		if ($this->student->store($studentRequest->all())) {
			return redirect(route('admin.student.index'));
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Student $student
	 * @return \Illuminate\Http\Response
	 */
	public function show(Student $student)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Student $student
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Student $student)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Models\Student $student
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request , Student $student)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Student $student
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Student $student)
	{
		//
	}
}
