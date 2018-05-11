<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentPlansTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student_plans' , function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->index()->default(0)->comment('属于哪个用户ID');
			$table->integer('student_id')->index();
			$table->integer('plan_id')->index()->default(0)->comment('估分方案类型');
			$table->string('plan_name')->index();
			$table->string('plan_number')->index()->default(0)->comment('计划序号');
			$table->string('plan_query')->default(0)->comment('方案查询条件');
			$table->boolean('is_save')->default(0)->comment('0:暂存,1:保存');
			$table->boolean('is_close')->default(0)->comment('0:不关闭,1:关闭,后台管理员设置');
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
		Schema::dropIfExists('student_plans');
	}
}
