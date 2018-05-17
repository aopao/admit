<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CollegeCategory
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $category_name
 * @property string $category_desc
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeCategory whereCategoryDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeCategory whereCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CollegeCategory whereUpdatedAt($value)
 */
class CollegeCategory extends Model
{
	protected $fillable = [ 'category_name' , 'category_desc' ];
}
