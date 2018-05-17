<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\StudentPlanDetail
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $student_id
 * @property int $plan_id
 * @property string|null $admit_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentPlanDetail whereAdmitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentPlanDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentPlanDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentPlanDetail wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentPlanDetail whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentPlanDetail whereUpdatedAt($value)
 */
class StudentPlanDetail extends Model
{
	protected $fillable = [ 'student_id' , 'plan_id' , 'admit_id' ];
}
