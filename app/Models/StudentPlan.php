<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\StudentPlan
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id 属于哪个用户ID
 * @property int $student_id
 * @property int $plan_id 估分方案类型
 * @property string $plan_name
 * @property string $plan_number 计划序号
 * @property string $plan_query 方案查询条件
 * @property int $is_save 0:暂存,1:保存
 * @property int $is_close 0:不关闭,1:关闭,后台管理员设置
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentPlan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentPlan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentPlan whereIsClose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentPlan whereIsSave($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentPlan wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentPlan wherePlanName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentPlan wherePlanNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentPlan wherePlanQuery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentPlan whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentPlan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentPlan whereUserId($value)
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
