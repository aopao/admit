<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Student
 *
 * @mixin \Eloquent
 */
class Student extends Model
{
	/**
	 * @var array
	 */
	protected $fillable = [
		'student_name' , 'age' , 'sex' , 'user_id' , 'nation' , 'province_id' ,
		'city_id' , 'area_id' , 'id_card' , 'contact' , 'mobile' , 'subject' ,
		'school' , 'address' , 'estimate_lowest_score' , 'estimate_highest_score' ,
		'estimate_lowest_rank' , 'estimate_highest_rank' , 'one_mode_score' , 'one_mode_rank' ,
		'two_mode_score' , 'two_mode_rank' , 'three_mode_score' , 'three_mode_rank' , 'score' ,
		'exam_score' , 'province_rank' , 'is_consider_military_school' , 'is_consider_police_school' ,
		'is_consider_teachers_school' , 'is_consider_foreign_school' , 'is_consider_directional_school' ,
		'is_consider_campus_school' , 'intention_major' , 'intention_college' , 'medical_note' , 'other_note' ,
		'active_date' , 'expiration_time'
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function province()
	{
		return $this->belongsTo(Province::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}

}
