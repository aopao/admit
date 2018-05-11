<?php

namespace App\Repositories;

use App\Models\College;

/**
 * Class CollegeRepository
 * @package App\Repositories
 */
class CollegeRepository
{
	/**
	 * @var college
	 */
	private $college;

	/**
	 * CollegeRepository constructor.
	 * @param $college $college
	 */
	public function __construct(College $college)
	{
		$this->college = $college;
	}


	public function getAll()
	{
		return $this->college->paginate(config('admin.page'));
	}

	/**
	 * @param $key
	 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
	 */
	public function getAllByQuery($key)
	{
		$keyword = '%' . $key . '%';
		return $this->college->orwhere('college_name' , 'like' , $keyword)
			->with('province' , 'CollegeCategory')->paginate(config('admin.page'));
	}


}