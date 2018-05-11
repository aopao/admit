<?php

namespace App\Repositories;

use App\Models\Student;

/**
 * Class SettingRepository
 * @package App\Repositories
 */
class StudentRepository
{
	/**
	 * @var student
	 */
	private $student;

	/**
	 * SettingRepository constructor.
	 * @param $student $student
	 */
	public function __construct(Student $student)
	{
		$this->student = $student;
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getAll()
	{
		return $this->student->all();
	}

	/**
	 * @param $key
	 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
	 */
	public function getAllByQuery($key)
	{
		$keyword = '%' . $key . '%';
		return $this->student->orwhere('name' , 'like' , $keyword)
			->orWhere('mobile' , 'like' , $keyword)
			->orWhere('card' , 'like' , $keyword)
			->with([ 'province' , 'user' ])->paginate(config('admin.page'));
	}

	/**
	 * @param array $student_info
	 * @return bool
	 */
	public function store(array $student_info)
	{
		$student_info[ 'intention_college' ] = $this->tranFormIntentionCollegeArrayToJson($student_info[ 'intention_college' ]);
		$student_info[ 'intention_major' ] = $this->tranFormIntentionMajorStringToJson($student_info[ 'intention_major' ]);
		print_r($student_info);

		exit();
//		return $this->student->create($student_info)->save();
	}

	/**
	 * @param string $string
	 * @return string
	 */
	private function tranFormIntentionMajorStringToJson(string $string)
	{
		$major_data = serialize(explode("|" , $string));
		return $major_data;
	}

	/**
	 * @param string $string
	 * @return string
	 */
	private function tranFormIntentionMajorJsonToString(string $string)
	{
		return json_decode(unserialize($string));
	}

	/**
	 * @param string $string
	 * @return string
	 */
	private function tranFormIntentionCollegeJsonToArray(string $string)
	{
		return json_decode(unserialize($string));
	}
}