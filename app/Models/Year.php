<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Year
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $year
 * @property string $desc
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Year whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Year whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Year whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Year whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Year whereYear($value)
 */
class Year extends Model
{
    //
}
