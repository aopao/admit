<?php
/**
 * Created by PhpStorm.
 * User: jason
 * Date: 2018/5/4
 * Time: 上午11:08
 */

namespace App\Repositories;

use App\Models\StudentPlanDetail;
use DB;
use Cache;
use Auth;
use App\Models\College;
use App\Models\CollegeAdmit;
use App\Models\StudentPlan;

/**
 * Class StudentPlanRepository
 *
 * @package App\Repositories
 */
class StudentPlanRepository
{
	/**
	 * @var province
	 */
	private $student_plan;
	/**
	 * @var College
	 */
	private $college;
	
	/**
	 * StudentPlanRepository constructor.
	 *
	 * @param StudentPlan $studentPlan
	 * @param College     $college
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
		return $this->student_plan->where('student_id' , $student_id)
								  ->where('plan_id' , $plan_id)
								  ->with('user')
								  ->limit(30)
								  ->get()->toArray();
	}
	
	/**
	 * @param $student_id
	 * @param $plan_model_id
	 * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed|null|static|static[]
	 */
	public function getDetailById($student_id , $plan_model_id)
	{
		return $this->student_plan::with('user')
								  ->find($plan_model_id);
	}
	
	/**
	 * @param $student_id
	 * @param $plan_model_id
	 * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed|null|static|static[]
	 */
	public function getInfoById($plan_model_id)
	{
		return $this->student_plan::with('user')
								  ->find($plan_model_id);
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
		$id = $this->student_plan->create($data);
		if ($id) {
			$html = $this->getHtml($data , $id->id , $student_id);
			return response()->json([ 'status' => '200' , 'html' => $html , ]);
		} else {
			return response()->json([ 'status' => '201' ]);
		}
	}
	
	public function update($data)
	{
		$student = new StudentPlan();
		$student_plan = $student->find($data[ 'id' ]);
		$student_plan[ 'plan_name' ] = $data[ 'plan_name' ];
		if ($student_plan->update()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	
	/**
	 * @param $plan_model_id
	 * @return bool|mixed|static
	 * @throws \Exception
	 */
	public  function destory($plan_model_id)
	{
		$plan = $this->getDetailById('' , $plan_model_id);
		$id = $plan[ 'id' ];
		$student_id = $plan[ 'student_id' ];
		if (StudentPlan::destroy($plan_model_id)) {
			StudentPlanDetail::where('student_id' , $student_id)
							 ->where('plan_id' , $id)->delete();
			return $plan[ 'plan_id' ];
		} else {
			return FALSE;
		}
	}
	
	
	/**
	 * @param $student_id
	 * @param $plan_model_id
	 * @param $data
	 * @return mixed
	 */
	public function searchMongoCollege($student_id , $plan_model_id , $data)
	{
		#处理 URl 加密 shai  查询缓存中是否有.
		$url = request()->url();
		$queryParams = request()->query();
		ksort($queryParams);
		unset($queryParams[ 'plan_id' ]);
		unset($queryParams[ 'student_id' ]);
		unset($queryParams[ 'user_id' ]);
		$queryString = http_build_query($queryParams);
		$fullUrl = "{$url}?{$queryString}";
		$rememberKey = sha1($fullUrl);
		
		/**主程序开始**/
		if (Cache::get($rememberKey)) {
			return Cache::get($rememberKey);
		} else {
			$intention_college = isset($data[ 'intention_college' ]) ? $data[ 'intention_college' ] : NULL;
			$subject = isset($data[ 'subject' ]) ? $data[ 'subject' ] : abort(404);
			$exam_address_province_id = isset($data[ 'exam_address_province_id' ]) ? $data[ 'exam_address_province_id' ] : abort(404);
			$estimate_lowest_score = isset($data[ 'estimate_lowest_score' ]) ? $data[ 'estimate_lowest_score' ] : 0;
			$estimate_highest_score = isset($data[ 'estimate_highest_score' ]) ? $data[ 'estimate_highest_score' ] : 0;
			$college_name = isset($data[ 'college_name' ]) ? $data[ 'college_name' ] : NULL;
			
			$college_admit = DB::connection('mongodb')->collection('list');
			/**先处理文理科**/
			$college_admit = $college_admit->where('provinces' , '' . $exam_address_province_id . '')
										   ->where('subject' , '' . $subject . '')
										   ->orderBy("year" , 'desc')
										   ->orderBy("school" , 'desc');
			
			/**如果输入了大学名称先处理大学**/
			if (isset($college_name)) {
				$college_admit = $college_admit->where('school' , 'like' , '%' . $college_name . '%');
			}
			
			/**如果输入了最低分数则查询分数**/
			if ($estimate_lowest_score > 0) {
				$college_admit = $college_admit->where('lowest' , '>' , '' . $estimate_lowest_score . '');
			}
			
			/**如果输入了最高分数则查询分数**/
			if ($estimate_highest_score > 1) {
				$college_admit = $college_admit->where('lowest' , '<' , '' . $estimate_highest_score . '');
			}
			
			/**如果选择省份则用省份查**/
			if (isset($intention_college)) {
				$college = College::query();
				$db = $college->whereIn('province_id' , $intention_college)->get()->toArray();
				$college_lists = [];
				collect($db)->map(function($item) use (&$college_lists) {
					array_push($college_lists , $item[ "﻿college_name" ]);
				});
				
				$college_admit = $college_admit->whereIn("school" , $college_lists);
			}
			#处理 URl 加密 shai  加入缓存
			$url = request()->url();
			$queryParams = request()->query();
			ksort($queryParams);
			unset($queryParams[ 'plan_id' ]);
			unset($queryParams[ 'student_id' ]);
			unset($queryParams[ 'user_id' ]);
			$queryString = http_build_query($queryParams);
			$fullUrl = "{$url}?{$queryString}";
			$rememberKey = sha1($fullUrl);
			$result = $college_admit->paginate(30);
			return Cache::remember($rememberKey , 1600 , function() use ($result) {
				return $result;
			});
			
		}
		
	}
	
	/**
	 * @param $student_id
	 * @param $plan_model_id
	 * @param $data
	 * @return mixed
	 */
	public function searchMongoKnowScoreCollege($student_id , $plan_model_id , $data)
	{
		#处理 URl 加密 shai  查询缓存中是否有.
		$url = request()->url();
		$queryParams = request()->query();
		ksort($queryParams);
		unset($queryParams[ 'plan_id' ]);
		unset($queryParams[ 'student_id' ]);
		unset($queryParams[ 'user_id' ]);
		$queryString = http_build_query($queryParams);
		$fullUrl = "{$url}?{$queryString}";
		$rememberKey = sha1($fullUrl);
		
		/**主程序开始**/
		if (Cache::get($rememberKey)) {
			return Cache::get($rememberKey);
		} else {
			$intention_college = isset($data[ 'intention_college' ]) ? $data[ 'intention_college' ] : NULL;
			$subject = isset($data[ 'subject' ]) ? $data[ 'subject' ] : abort(404);
			$exam_address_province_id = isset($data[ 'exam_address_province_id' ]) ? $data[ 'exam_address_province_id' ] : abort(404);
			$estimate_lowest_score = $data[ 'exam_score' ] - 10;
			$estimate_highest_score = $data[ 'exam_score' ] + 10;
			$college_name = isset($data[ 'college_name' ]) ? $data[ 'college_name' ] : NULL;
			
			$college_admit = DB::connection('mongodb')->collection('list');
			/**先处理文理科**/
			$college_admit = $college_admit->where('provinces' , '' . $exam_address_province_id . '')
										   ->where('lowest' , '>=' , '' . $estimate_lowest_score . '')
										   ->where('lowest' , '<=' , '' . $estimate_highest_score . '')
										   ->where('subject' , '' . $subject . '')
										   ->orderBy("year" , 'desc')
										   ->orderBy("school" , 'desc');
			
			/**如果输入了大学名称先处理大学**/
			if (isset($college_name)) {
				$college_admit = $college_admit->where('school' , 'like' , '%' . $college_name . '%');
			}
			
			/**如果选择省份则用省份查**/
			if (isset($intention_college)) {
				$college = College::query();
				$db = $college->whereIn('province_id' , $intention_college)->get()->toArray();
				$college_lists = [];
				collect($db)->map(function($item) use (&$college_lists) {
					array_push($college_lists , $item[ "﻿college_name" ]);
				});
				$college_admit = $college_admit->whereIn("school" , $college_lists);
			}
			
			#处理 URl 加密 shai  加入缓存
			$url = request()->url();
			$queryParams = request()->query();
			ksort($queryParams);
			unset($queryParams[ 'plan_id' ]);
			unset($queryParams[ 'student_id' ]);
			unset($queryParams[ 'user_id' ]);
			$queryString = http_build_query($queryParams);
			$fullUrl = "{$url}?{$queryString}";
			$rememberKey = sha1($fullUrl);
			$result = $college_admit->paginate(30);
			return Cache::remember($rememberKey , 1600 , function() use ($result) {
				return $result;
			});
			
		}
		
	}
	
	/**
	 * @param $student_id
	 * @param $plan_model_id
	 * @param $data
	 * @return mixed
	 */
	public function searchCollege($student_id , $plan_model_id , $data)
	{
		#处理 URl 加密 shai  查询缓存中是否有.
		$url = request()->url();
		$queryParams = request()->query();
		ksort($queryParams);
		unset($queryParams[ 'plan_id' ]);
		unset($queryParams[ 'student_id' ]);
		unset($queryParams[ 'user_id' ]);
		$queryString = http_build_query($queryParams);
		$fullUrl = "{$url}?{$queryString}";
		$rememberKey = sha1($fullUrl);
		
		/**主程序开始**/
		if (Cache::get($rememberKey)) {
			return Cache::get($rememberKey);
		} else {
			$intention_college = isset($data[ 'intention_college' ]) ? $data[ 'intention_college' ] : NULL;
			$subject = isset($data[ 'subject' ]) ? $data[ 'subject' ] : abort(404);
			$exam_address_province_id = isset($data[ 'exam_address_province_id' ]) ? $data[ 'exam_address_province_id' ] : abort(404);
			$estimate_lowest_score = isset($data[ 'estimate_lowest_score' ]) ? $data[ 'college_name' ] : 0;
			$estimate_highest_score = isset($data[ 'estimate_highest_score' ]) ? $data[ 'college_name' ] : 0;
			$college_name = isset($data[ 'college_name' ]) ? $data[ 'college_name' ] : NULL;
			
			$college_admit = CollegeAdmit::query();
			$college = College::query();
			
			/**先处理文理科**/
			$college_admit = $college_admit->where('subject' , $subject);
			
			$college_admit = $college_admit->where('province' , $exam_address_province_id);
			
			/**如果输入了大学名称先处理大学**/
			if (isset($college_name)) {
				$college_admit = $college_admit->where('college' , 'like' , '%' . $college_name . '%');
			}
			
			/**如果输入了最低分数则查询分数**/
			if ($estimate_lowest_score > 0) {
				$college_admit = $college_admit->where('﻿lowest_score' , '>=' , $estimate_lowest_score);
			}
			/**如果输入了最高分数则查询分数**/
			if ($estimate_highest_score > 1) {
				$college_admit = $college_admit->where('﻿lowest_score' , '<=' , $estimate_highest_score);
			}
			
			/**如果输入了地区**/
			if (isset($intention_college)) {
				$db = $college->whereIn('province_id' , $intention_college)->get()->toArray();
				
				$college_lists = [];
				collect($db)->map(function($item) use (&$college_lists) {
					array_push($college_lists , $item[ "﻿college_name" ]);
				});
				$college_admit = $college_admit->whereIn('college' , $college_lists);
			}
			
			#处理 URl 加密 shai  加入缓存
			$url = request()->url();
			$queryParams = request()->query();
			ksort($queryParams);
			unset($queryParams[ 'plan_id' ]);
			unset($queryParams[ 'student_id' ]);
			unset($queryParams[ 'user_id' ]);
			$queryString = http_build_query($queryParams);
			$fullUrl = "{$url}?{$queryString}";
			$rememberKey = sha1($fullUrl);
			$result = $college_admit->orderBy("year" , 'desc')->paginate(10);
			return Cache::remember($rememberKey , 1600 , function() use ($result) {
				return $result;
			});
			
		}
		
	}
	
	
	/**
	 * @param $data
	 * @param $id
	 * @param $student_id
	 * @return string
	 */
	private function getHtml($data , $id , $student_id)
	{
		$html = '';
		$html .= " <tr align = 'center'> ";
		$html .= "<td > " . $data[ 'plan_number' ] . " </td > ";
		$html .= "<td > " . $data[ 'plan_name' ] . " </td > ";
		$html .= "<td > " . Auth::user()->nickname . "</td > ";
		if ($data[ 'is_close' ] == 0) {
			$html .= '<td><span class="badge badge-success">正常</span></td>';
		} else {
			$html .= '<td><span class="badge badge-danger"> 弃用</span></td>';
		}
		$html .= "<td>" . date('Y-m-d H:i:s' , time()) . " </td> ";
		$html .= "<td > ";
		$html .= "<a href = '" . route('admin.plan.show' , [ 'student_id' => $student_id , 'plan_model_id' => $id ]) . "' class=\"btn btn-outline btn-success btn-xs\"><i class=\"icon wb-eye\" aria-hidden=\"true\"></i></a> ";
		$html .= "<a href='" . route('admin.plan.edit' , [ 'student_id' => $student_id , 'plan_model_id' => $id ]) . "' class=\"btn btn-outline btn-primary btn-xs\"><i class=\"icon wb-pencil\" aria-hidden=\"true\"></i></a> ";
		$html .= "<a href='" . route('admin.plan.destroy' , [ 'student_id' => $student_id , 'plan_model_id' => $id ]) . "' class=\"btn btn-outline btn-danger btn-xs\"><i class=\"icon wb-trash\" aria-hidden=\"true\"></i></a> ";
		$html .= "</td>";
		$html .= "</tr>";
		return $html;
	}
}