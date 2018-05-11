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

	public function province()
	{
		return $this->belongsTo(Province::class);
	}

	public function CollegeCategory()
	{
		return $this->belongsTo(CollegeCategory::class);
	}
}
