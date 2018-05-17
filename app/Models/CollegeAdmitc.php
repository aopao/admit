<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CollegeAdmit
 *
 * @mixin \Eloquent
 * @property int $cid
 * @property string|null $school
 * @property string|null $provinces
 * @property int|null $year
 * @property string|null $batch 如果没有专业 ID, 则直接写专业名称
 * @property string|null $subject 0:文科1:理科
 * @property string|null $major 专业id
 * @property int|null $planNumbers
 * @property int|null $lowLine
 * @property int|null $lowest
 * @property int|null $lowRanking
 * @property int|null $average
 * @property int|null $averageRanking
 * @property int|null $averageLine
 * @property string|null $advantage
 * @property string|null $explain
 * @property string|null $college
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeAdmitc whereAdvantage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeAdmitc whereAverage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeAdmitc whereAverageLine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeAdmitc whereAverageRanking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeAdmitc whereBatch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeAdmitc whereCid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeAdmitc whereCollege($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeAdmitc whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeAdmitc whereExplain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeAdmitc whereLowLine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeAdmitc whereLowRanking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeAdmitc whereLowest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeAdmitc whereMajor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeAdmitc wherePlanNumbers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeAdmitc whereProvinces($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeAdmitc whereSchool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeAdmitc whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeAdmitc whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeAdmitc whereYear($value)
 */
class CollegeAdmitc extends Model
{
	protected $table = 'college_admitc';
}
