<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Student
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $student_name
 * @property int $sex 默认为0:女士,1:男士
 * @property int $age
 * @property string|null $nation
 * @property int $province_id 户籍省份
 * @property int|null $city_id
 * @property int|null $area_id
 * @property string|null $id_card 身份证
 * @property string|null $contact 联系人名称
 * @property string|null $mobile 联系人手机
 * @property string $subject 默认为0:文科,1:理科
 * @property string|null $school
 * @property int|null $exam_address_province_id 高考考试省份
 * @property int|null $estimate_lowest_score 高考估分最低分 OR 门槛分
 * @property int|null $estimate_highest_score 高考估分最高分 OR 安全分
 * @property int|null $estimate_lowest_rank 高考最低省排名
 * @property int|null $estimate_highest_rank 高考最高省排名
 * @property int|null $one_mode_score 一模成绩
 * @property int|null $one_mode_rank 一模排名
 * @property int|null $two_mode_score 二模成绩
 * @property int|null $two_mode_rank 二模排名
 * @property int|null $three_mode_score 三模成绩
 * @property int|null $three_mode_rank 三模排名
 * @property int|null $score 语数外成绩
 * @property int|null $exam_score 高考分数
 * @property int|null $province_rank 高考省排名
 * @property int $is_consider_military_school 是否考虑军校
 * @property int $is_consider_police_school 是否考虑公安院校
 * @property int $is_consider_teachers_school 是否考虑免费师范生
 * @property int $is_consider_foreign_school 是否考虑中外合作办学
 * @property int $is_consider_directional_school 是否考虑定向、民族预科班
 * @property int $is_consider_campus_school 是否考虑院校分校
 * @property string|null $intention_major 意向专业
 * @property string|null $intention_college 意向院校地区
 * @property string|null $medical_note 体检备注
 * @property string|null $other_note 其他备注
 * @property string|null $active_date 注册激活日期
 * @property string|null $expiration_time 授权查询截至日期0;默认为终身
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Province $province
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereActiveDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereEstimateHighestRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereEstimateHighestScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereEstimateLowestRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereEstimateLowestScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereExamAddressProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereExamScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereExpirationTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereIdCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereIntentionCollege($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereIntentionMajor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereIsConsiderCampusSchool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereIsConsiderDirectionalSchool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereIsConsiderForeignSchool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereIsConsiderMilitarySchool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereIsConsiderPoliceSchool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereIsConsiderTeachersSchool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereMedicalNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereNation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereOneModeRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereOneModeScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereOtherNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereProvinceRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereSchool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereStudentName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereThreeModeRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereThreeModeScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereTwoModeRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereTwoModeScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereUserId($value)
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
