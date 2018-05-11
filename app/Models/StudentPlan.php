<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\StudentPlan
 *
 * @mixin \Eloquent
 */
class StudentPlan extends Model
{
	protected $fillable = [ 'user_id' , 'student_id' , 'plan_id' , 'plan_name' , 'plan_number' , 'plan_query' , 'is_save' , 'is_close' ];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
