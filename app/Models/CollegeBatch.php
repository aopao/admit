<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CollegeBatch
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $college_id
 * @property string $batch_name
 * @property int $year
 * @property string $desc
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeBatch whereBatchName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeBatch whereCollegeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeBatch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeBatch whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeBatch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeBatch whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeBatch whereYear($value)
 */
class CollegeBatch extends Model
{
    //
}
