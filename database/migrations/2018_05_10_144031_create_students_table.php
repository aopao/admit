<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students' , function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->index();
			$table->string('student_name')->index();
			$table->boolean('sex')->default(0)->comment('默认为0:女士,1:男士');
			$table->tinyInteger('age')->default(0);
			$table->string('nation')->nullable();
			$table->tinyInteger('province_id')->default(0)->index()->comment('户籍省份');
			$table->integer('city_id')->nullable();
			$table->integer('area_id')->nullable();
			$table->string('id_card')->nullable()->comment('身份证');
			$table->string('contact')->nullable()->comment('联系人名称');
			$table->string('mobile')->nullable()->comment('联系人手机');
			$table->string('subject')->default(0)->comment('默认为0:文科,1:理科');
			$table->string('school')->nullable();
			$table->integer('exam_address_province_id')->nullable()->comment('高考考试省份');
			$table->integer('estimate_lowest_score')->nullable()->comment('高考估分最低分 OR 门槛分');
			$table->integer('estimate_highest_score')->nullable()->comment('高考估分最高分 OR 安全分');
			$table->integer('estimate_lowest_rank')->nullable()->comment('高考最低省排名');
			$table->integer('estimate_highest_rank')->nullable()->comment('高考最高省排名');
			$table->integer('one_mode_score')->nullable()->comment('一模成绩');
			$table->integer('one_mode_rank')->nullable()->comment('一模排名');
			$table->integer('two_mode_score')->nullable()->comment('二模成绩');
			$table->integer('two_mode_rank')->nullable()->comment('二模排名');
			$table->integer('three_mode_score')->nullable()->comment('三模成绩');
			$table->integer('three_mode_rank')->nullable()->comment('三模排名');
			$table->integer('score')->nullable()->comment('语数外成绩');
			$table->integer('exam_score')->nullable()->comment('高考分数');
			$table->integer('province_rank')->nullable()->comment('高考省排名');
			$table->boolean('is_consider_military_school')->default(0)->comment('是否考虑军校');
			$table->boolean('is_consider_police_school')->default(0)->comment('是否考虑公安院校');
			$table->boolean('is_consider_teachers_school')->default(0)->comment('是否考虑免费师范生');
			$table->boolean('is_consider_foreign_school')->default(0)->comment('是否考虑中外合作办学');
			$table->boolean('is_consider_directional_school')->default(0)->comment('是否考虑定向、民族预科班');
			$table->boolean('is_consider_campus_school')->default(0)->comment('是否考虑院校分校');
			$table->string('intention_major')->nullable()->comment('意向专业');
			$table->string('intention_college')->nullable()->comment('意向院校地区');
			$table->string('medical_note')->nullable()->comment('体检备注');
			$table->string('other_note')->nullable()->comment('其他备注');
			$table->string('active_date')->nullable()->comment('注册激活日期');
			$table->string('expiration_time')->nullable()->comment('授权查询截至日期0;默认为终身');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('students');
	}
}
