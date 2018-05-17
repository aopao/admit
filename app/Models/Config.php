<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Config
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $key
 * @property string|null $value
 * @property string|null $display_name 明文识别文字
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config whereValue($value)
 */
class Config extends Model
{
    //
}
