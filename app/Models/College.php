<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\College
 *
 * @mixin \Eloquent
 */
class College extends Model
{

	protected $fillable = [ '﻿college_name' , 'province_id' , 'city_id' , 'category_id' , 'is_top_college' , 'admission' , 'admission_detail' , '﻿admission_scale' ];

	public function province()
	{
		return $this->belongsTo(Province::class);
	}

	public function city()
	{
		return $this->belongsTo(City::class , 'city_id');
	}

	public function CollegeCategory()
	{
		return $this->belongsTo(CollegeCategory::class , 'category_id');
	}
}
