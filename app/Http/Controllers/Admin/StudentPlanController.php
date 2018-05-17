<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\StudentPlanRepository;
use App\Repositories\StudentRepository;
use App\Repositories\ProvinceRepository;
use App\Repositories\StudentPlanDetailRepository;

/**
 * Class StudentPlanController
 * @package App\Http\Controllers\Admin
 */
class StudentPlanController extends BaseController
{
	/**
	 * @var ProvinceRepository
	 */
	private $province;

	/**
	 * @var StudentRepository
	 */
	private $student;
	/**
	 * @var StudentPlanRepository
	 */
	private $student_plan;
	/**
	 * @var StudentPlanDetailRepository
	 */
	private $student_plan_detail;

	/**
	 * StudentPlanController constructor.
	 * @param StudentRepository $studentRepository
	 * @param StudentPlanRepository $studentPlanRepository
	 * @param StudentPlanDetailRepository $studentPlanDetailRepository
	 * @param ProvinceRepository $provinceRepository
	 */
	public function __construct(StudentRepository $studentRepository , StudentPlanRepository $studentPlanRepository , StudentPlanDetailRepository $studentPlanDetailRepository , ProvinceRepository $provinceRepository)
	{
		parent::__construct();
		$this->student = $studentRepository;
		$this->student_plan = $studentPlanRepository;
		$this->province = $provinceRepository;
		$this->student_plan_detail = $studentPlanDetailRepository;
		
	}
	

	/**
	 * @param $student_id
	 * @param $plan_id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index($student_id , $plan_id)
	{
		if (in_array($plan_id , [ 1 , 3 ])) {
			$student_info = $this->student->isAvailable($student_id , true);
			$plan_list = $this->student_plan->getAll($student_id , $plan_id);
			return view('admins.plan.index' , compact('plan_list' , 'student_info' , 'plan_id'));
		} else {
			abort(404);
		}
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
		$data[ 'student_id' ] = $student_id;
		$data[ 'plan_model_id' ] = $plan_model_id;
		switch ($plan_detail[ 'plan_id' ]) {
			/**院校方案**/
			case 1:
				if ($plan_detail[ 'is_save' ]) {
					$admit_lists = $this->student_plan_detail->getAllByIds($data);
					return view('admins.plan.plan_list_show' , compact('student_info' , 'admit_lists' , 'plan_detail' , 'province_list' , 'data'));
				} else {
					return view('admins.plan.show_college' , compact('student_info' , 'plan_detail' , 'province_list'));
				}
			/**估分方案**/
			case 2:
				abort(404);
			/**知分方案**/
			case 3:
				if ($plan_detail[ 'is_save' ]) {
					$admit_lists = $this->student_plan_detail->getAllByIds($data);
					return view('admins.plan.plan_list_show' , compact('student_info' , 'admit_lists' , 'plan_detail' , 'province_list' , 'data'));
				} else {
					return view('admins.plan.show_konw' , compact('student_info' , 'plan_detail' , 'province_list'));
				}
		}

	}

	/**
	 * @param $student_id
	 * @param $plan_model_id
	 * @param Request $request
	 * @return string
	 */
	public function addPlan($student_id , $plan_model_id , Request $request)
	{
		$data[ 'student_id' ] = $student_id;
		$data[ 'plan_model_id' ] = $plan_model_id;
		$data[ 'ids' ] = $request->input('ids');
		return $this->student_plan_detail->addByIds($data);
	}

	public function edit($student_id , $plan_model_id , Request $request)
	{
		$plan_info = $this->student_plan->getInfoById($plan_model_id);
		return view('admins.plan.edit' , compact('plan_info'));
	}

	public function update(Request $request)
	{
		if ($this->student_plan->update($request->all())) {
			return redirect(route('admin.plan.index' , [ 'student_id' => $request->input('student_id') , 'plan_id' => $request->input('plan_id') ]))
				->with('delete_message' , '修改成功!');
		} else {
			return redirect(route('admin . plan . index' , [ 'student_id' => $request->input('student_id') , 'plan_id' => $request->input('plan_id') ]))
				->with('delete_message' , '修改失败!');
		}
	}

	/**
	 * @param $student_id
	 * @param $plan_model_id
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function destroy($student_id , $plan_model_id)
	{
		$plan_id = $this->student_plan->destory($plan_model_id);
		if ($plan_id) {
			return redirect(route('admin . plan . index' , [ 'student_id' => $student_id , 'plan_id' => $plan_id ]))->with('delete_message' , '删除成功!');
		}
	}

	/**
	 * @param $student_id
	 * @param $plan_model_id
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
	 */
	public function search($student_id , $plan_model_id , Request $request)
	{
		$slug = True;
		$query_params = request()->query();
		ksort($query_params);
		if ($slug) {
			$estimate_lowest_score = $request->input('estimate_lowest_score');
			$estimate_highest_score = $request->input('estimate_highest_score');
			if ($estimate_highest_score - $estimate_lowest_score > 10) {
				return redirect()->back()->with('message' , '最低分最高分差值不得超过10分');
			}
			$admit_lists = $this->student_plan->searchMongoCollege($student_id , $plan_model_id , $request->all());
			return view('admins.plan.mlist' , compact('admit_lists' , 'student_id' , 'plan_model_id' , 'query_params'));
		} else {
			$admit_lists = $this->student_plan->searchCollege($student_id , $plan_model_id , $request->all());
			return view('admins.plan.list' , compact('admit_lists' , 'student_id' , 'plan_model_id' , 'query_params'));
		}
	}

	/**
	 * @param $student_id
	 * @param $plan_model_id
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
	 */
	public function searchKnowScore($student_id , $plan_model_id , Request $request)
	{
		$slug = True;
		$query_params = request()->query();
		ksort($query_params);
		if ($slug) {
			$exam_score = $request->input('exam_score');
			if (!is_numeric($exam_score) || $exam_score <= 0) {
				return redirect()->back()->with('message' , '高考分数请正确填写');
			}
			$admit_lists = $this->student_plan->searchMongoKnowScoreCollege($student_id , $plan_model_id , $request->all());
			return view('admins . plan . mlist' , compact('admit_lists' , 'student_id' , 'plan_model_id' , 'query_params'));
		} else {
			$admit_lists = $this->student_plan->searchCollege($student_id , $plan_model_id , $request->all());
			return view('admins . plan . list' , compact('admit_lists' , 'student_id' , 'plan_model_id' , 'query_params'));
		}
	}


}
