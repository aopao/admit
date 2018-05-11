<?php
/**
 * Created by PhpStorm.
 * User: jason
 * Date: 2018/5/4
 * Time: 上午11:08
 */

namespace App\Repositories;

use App\Models\Province;

/**
 * Class ProvinceRepository
 * @package App\Repositories
 */
class ProvinceRepository
{
	/**
	 * @var province
	 */
	private $province;

	/**
	 * ProvinceRepository constructor.
	 * @param $province $province
	 */
	public function __construct(Province $province)
	{
		$this->province = $province;
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getAll()
	{
		return $this->province->all()->toArray();
	}

}