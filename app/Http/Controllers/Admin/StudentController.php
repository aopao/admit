<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Repositories\StudentRepository;
use App\Repositories\ProvinceRepository;

/**
 * Class StudentController
 * @package App\Http\Controllers\Admin
 */
class StudentController extends BaseController
{
	/**
	 * @var StudentRepository
	 */
	private $student;
	private $province;

	/**
	 * StudentController constructor.
	 * @param StudentRepository $studentRepository
	 * @param ProvinceRepository $provinceRepository
	 */
	public function __construct(StudentRepository $studentRepository , ProvinceRepository $provinceRepository)
	{
		parent::__construct();
		$this->student = $studentRepository;
		$this->province = $provinceRepository;
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
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		# 获取省份列表
		$province_list = $this->province->getAll();
		return view('admins.student.create' , compact('province_list'));
	}


	/**
	 * @param StudentRequest $studentRequest
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function store(StudentRequest $studentRequest)
	{
		if ($this->student->store($studentRequest->all())) {
			return redirect(route('admin.student.index'))->with('message' , '添加成功!');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param $student_id
	 * @return \Illuminate\Http\Response
	 */
	public function show($student_id)
	{
		$student_info = $this->student->isAvailable($student_id , true);
		# 获取省份列表
		$province_list = $this->province->getAll();
		return view('admins.student.show' , compact('' , 'student_info' , 'province_list'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $student_id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($student_id)
	{
		$student_info = $this->student->isAvailable($student_id , true);
		# 获取省份列表
		$province_list = $this->province->getAll();
		return view('admins.student.edit' , compact('' , 'student_info' , 'province_list'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param StudentRequest $studentRequest
	 * @param $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(StudentRequest $studentRequest , $id)
	{
		if ($this->student->update($studentRequest->all() , $id)) {
			return redirect(route('admin.student.index'))->with('message' , '修改成功!');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Student $student
	 * @return \Illuminate\Http\Response
	 */
	public function destroy()
	{
		//
	}
}
