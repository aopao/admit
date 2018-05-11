<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\StudentPlanRepository;
use App\Repositories\StudentRepository;
use App\Repositories\ProvinceRepository;

/**
 * Class StudentPlanController
 * @package App\Http\Controllers\Admin
 */
class StudentPlanController extends BaseController
{

	/**
	 * @var StudentRepository
	 */
	private $student;
	/**
	 * @var StudentPlanRepository
	 */
	private $student_plan;
	/**
	 * @var ProvinceRepository
	 */
	private $province;

	/**
	 * StudentPlanController constructor.
	 * @param StudentRepository $studentRepository
	 * @param StudentPlanRepository $studentPlanRepository
	 * @param ProvinceRepository $provinceRepository
	 */
	public function __construct(StudentRepository $studentRepository , StudentPlanRepository $studentPlanRepository , ProvinceRepository $provinceRepository)
	{
		parent::__construct();
		$this->student = $studentRepository;
		$this->student_plan = $studentPlanRepository;
		$this->province = $provinceRepository;
	}

	/**
	 * @param $student_id
	 * @param $plan_id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index($student_id , $plan_id)
	{
		$student_info = $this->student->isAvailable($student_id , true);
		$plan_list = $this->student_plan->getAll($student_id , $plan_id);
		return view('admins.plan.index' , compact('plan_list' , 'student_info' , 'plan_id'));
	}

	/**
	 * @param $student_id
	 * @param $plan_id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function create($student_id , $plan_id)
	{
		return $this->student_plan->create($student_id , $plan_id);
	}

	/**
	 * @param $student_id
	 * @param $plan_model_id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($student_id , $plan_model_id)
	{
		$student_info = $this->student->getStudentByIdWithProvinceAndUser($student_id);
		$plan_detail = $this->student_plan->getDetailById($student_id , $plan_model_id);
		$province_list = $this->province->getAll();
		return view('admins.plan.show' , compact('student_info' , 'plan_detail' , 'province_list'));
	}

	public function search($student_id , $plan_model_id , Request $request)
	{
		$this->student_plan->searchCollege($student_id , $plan_model_id , $request->all());
	}

	/**
	 * @param $student_info
	 */
	private function collegePlan($student_info)
	{
		echo 1;
	}
}
