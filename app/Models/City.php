<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\City
 *
 * @property int $id
 * @property int $province_id
 * @property string $name
 * @property string|null $code
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereProvinceId($value)
 * @mixin \Eloquent
 */
class City extends Model
{
    //
}
