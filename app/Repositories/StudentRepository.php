<?php

namespace App\Repositories;

use App\Models\Student;

/**
 * Class StudentRepository
 *
 * @package App\Repositories
 */
class StudentRepository
{
	/**
	 * @var student
	 */
	private $student;

	/**
	 * StudentRepository constructor.
	 *
	 * @param $student $student
	 */
	public function __construct(Student $student)
	{
		$this->student = $student;
	}


	/**
	 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
	 */
	public function getAll()
	{
		return $this->student->paginate(config('admin.page'));
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
		if (isset($student_info[ 'intention_college' ])) {
			$student_info[ 'intention_college' ] = $this->tranFormIntentionCollegeArrayToJson($student_info[ 'intention_college' ]);
		}
		if (isset($student_info[ 'intention_major' ])) {
			$student_info[ 'intention_major' ] = $this->tranFormIntentionMajorStringToJson($student_info[ 'intention_major' ]);
		}
		return $this->student->create($student_info)->save();
	}

	/**
	 * @param $student_id
	 */
	public function getStudentById($student_id)
	{
		$this->isAvailable($student_id);
	}


	/**
	 * @param $student_id
	 * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed|null|static|static[]
	 */
	public function getStudentByIdWithProvinceAndUser($student_id)
	{
		return $this->student->with('province' , 'user')->find($student_id);
	}

	/**
	 * @param      $student_id
	 * @param bool $slug
	 * @return mixed|static
	 */
	public function isAvailable($student_id , $slug = FALSE)
	{
		$student_info = $this->student->find($student_id);
		if (!$student_info) {
			abort(404);
		} else {
			if ($slug) {
				if (isset($student_info[ 'intention_college' ])) {
					$student_info[ 'intention_college' ] = $this->tranFormIntentionCollegeJsonToArray($student_info[ 'intention_college' ]);
				}
				if (isset($student_info[ 'intention_major' ])) {
					$student_info[ 'intention_major' ] = $this->tranFormIntentionMajorJsonToString($student_info[ 'intention_major' ]);
				}
			}
			return $student_info;
		}
	}

	/**
	 * @param array $student_info
	 * @param       $id
	 * @return bool
	 */
	public function update(array $student_info , $id)
	{
		$student = $this->student->find($id);
		if (isset($student_info[ 'intention_college' ])) {
			$student_info[ 'intention_college' ] = $this->tranFormIntentionCollegeArrayToJson($student_info[ 'intention_college' ]);
		}
		if (isset($student_info[ 'intention_major' ])) {
			$student_info[ 'intention_major' ] = $this->tranFormIntentionMajorStringToJson($student_info[ 'intention_major' ]);
		}
		return $student->update($student_info);
	}

	/**
	 * @param $id
	 * @return bool|null
	 * @throws \Exception
	 */
	public function destroy($id)
	{
		return Student::destroy($id);
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
	 * @param array $array
	 * @return string
	 */
	private function tranFormIntentionCollegeArrayToJson(array $array)
	{
		$major_data = serialize(json_encode($array));
		return $major_data;
	}

	/**
	 * @param string $string
	 * @return string
	 */
	private function tranFormIntentionMajorJsonToString(string $string)
	{
		return implode('|' , unserialize($string));
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