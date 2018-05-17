<?php

namespace App\Repositories;

use DB;
use App\Models\CollegeAdmit;
use App\Models\StudentPlan;
use App\Models\StudentPlanDetail;

/**
 * Class StudentPlanDetailRepository
 *
 * @package App\Repositories
 */
class StudentPlanDetailRepository
{
	/**
	 * @var config
	 */
	private $student_Plan_edtail;

	/**
	 * StudentPlanDetail constructor.
	 *
	 * @param $student_Plan_edtail $student_Plan_edtail
	 */
	public function __construct(StudentPlanDetail $student_Plan_edtail)
	{
		$this->student_Plan_edtail = $student_Plan_edtail;
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getAll()
	{
		return $this->student_Plan_edtail->all();
	}

	/**
	 * @param $data
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getAllByIds($data)
	{
		$admit_lists = $this->student_Plan_edtail->where('student_id' , $data[ 'student_id' ])
												 ->where('plan_id' , $data[ 'plan_model_id' ])
												 ->pluck('admit_id');
		$college_admit = DB::connection('mongodb')->collection('list');
		$college_admit_lists = $college_admit->whereIn('_id' , $admit_lists)->paginate(30);
		return $college_admit_lists;
	}


	/**
	 * @param $data
	 * @return string
	 */
	public function addByIds($data)
	{
		$ids_array = explode('|' , $data[ 'ids' ]);
		$model = new StudentPlan();
		$student = $model->find($data[ 'plan_model_id' ]);
		$student[ 'is_save' ] = 1;
		$student->update();
		foreach ($ids_array as $value) {
			if (strlen($value) == 24) {
				$insert_data = [
					'student_id' => $data[ 'student_id' ] ,
					'plan_id' => $data[ 'plan_model_id' ] ,
					'admit_id' => $value ,
				];
				$this->student_Plan_edtail->updateOrCreate($insert_data);
			} else {
				return "{'status':'200'}";
			}
		}

	}


}