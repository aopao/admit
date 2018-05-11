<?php
/**
 * Created by PhpStorm.
 * User: jason
 * Date: 2018/5/4
 * Time: 上午11:08
 */

namespace App\Repositories;

use Auth;
use App\Models\College;
use App\Models\CollegeAdmit;
use App\Models\StudentPlan;

/**
 * Class StudentPlanRepository
 * @package App\Repositories
 */
class StudentPlanRepository
{
	/**
	 * @var province
	 */
	private $student_plan;
	private $college;

	/**
	 * StudentPlanRepository constructor.
	 * @param StudentPlan $studentPlan
	 * @param College $college
	 */
	public function __construct(StudentPlan $studentPlan , College $college)
	{
		$this->student_plan = $studentPlan;
		$this->college = $college;
	}

	/**
	 * @param $student_id
	 * @param $plan_id
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getAll($student_id , $plan_id)
	{
		return $this->student_plan->where('student_id' , $student_id)->where('plan_id' , $plan_id)->with('user')->limit(30)->get()->toArray();
	}

	public function getDetailById($student_id , $plan_model_id)
	{
		return $this->student_plan::with('user')->find($plan_model_id);
	}

	/**
	 * @param $student_id
	 * @param $plan_id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function create($student_id , $plan_id)
	{
		if ($plan_id <= 0 || $plan_id > 3) {
			abort(404);
		}
		#组装分类信息
		$data = [
			'plan_id' => $plan_id ,
			'plan_name' => config('plan.' . $plan_id) ,
			'plan_number' => date('YmdHis' , time()) . rand(1000 , 9999) ,
			'plan_query' => '' ,
			'student_id' => $student_id ,
			'user_id' => Auth::user()->id ,
			'is_save' => 0 ,
			'is_close' => 0 ,
		];

		$html = $this->getHtml($data);
		if ($this->student_plan->create($data)->save()) {
			return response()->json([ 'status' => '200' , 'html' => $html , ]);
		} else {
			return response()->json([ 'status' => '201' ]);
		}
	}

	public function searchCollege($student_id , $plan_model_id , $data)
	{
		$subject = $data[ 'subject' ];
		$estimate_lowest_score = $data[ 'estimate_lowest_score' ];
		$estimate_highest_score = $data[ 'estimate_highest_score' ];
		$college_name = $data[ 'college_name' ];
		$college_list = College::find();

		$db = CollegeAdmit::query();
		$college_admit = College::query();
		#先处理省份->获取省份ID
		if (isset($data[ 'intention_college' ])) {
			$db = $db->whereIn('province_id' , $data[ 'intention_college' ]);
		}

		#筛选省份ID ->查询专业学校录取分数
		if (isset($data[ 'estimate_lowest_score' ])) {
			$db = $db->where('lowest_score' , '>' , $data[ 'estimate_lowest_score' ]);
		}
		if (isset($data[ 'estimate_highest_score' ])) {
			$db = $db->where('lowest_score' , '<' , $data[ 'estimate_lowest_score' ]);
		}
		if(isset($data[ 'college_name' ])){
			$db = $db->where('lowest_score' , '<' , $data[ 'estimate_lowest_score' ]);
		}
	}

	/**
	 * @param $data
	 * @return string
	 */
	private function getHtml($data)
	{
		$html = '';
		$html .= "<tr align='center'>";
		$html .= "<td>" . $data[ 'plan_number' ] . "</td>";
		$html .= "<td>" . $data[ 'plan_name' ] . "</td>";
		$html .= "<td>" . Auth::user()->nickname . "</td>";
		if ($data[ 'is_close' ] == 0) {
			$html .= '<td><span class="badge badge-success">正常</span></td>';
		} else {
			$html .= '<td><span class="badge badge-danger"> 弃用</span></td>';
		}
		$html .= "<td>" . date('Y-m-d H:i:s' , time()) . "</td>";
		$html .= "<td>";
		$html .= "<a href=\"sdfsdf\" class=\"btn btn-outline btn-success btn-xs\"><i class=\"icon wb-eye\" aria-hidden=\"true\"></i></a> ";
		$html .= "<a href=\"dfsdf\" class=\"btn btn-outline btn-primary btn-xs\"><i class=\"icon wb-pencil\" aria-hidden=\"true\"></i></a> ";
		$html .= "<a href=\"dfsdf\" class=\"btn btn-outline btn-danger btn-xs\"><i class=\"icon wb-trash\" aria-hidden=\"true\"></i></a> ";
		$html .= "</td>";
		$html .= "</tr>";
		return $html;
	}
}