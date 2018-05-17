<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentPlanDetailsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student_plan_details' , function(Blueprint $table) {
			$table->increments('id');
			$table->integer('student_id')->index()->default(0)->index();
			$table->integer('plane_id')->index()->default(0)->index();
			$table->string('admit_id');
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
		Schema::dropIfExists('student_plan_details');
	}
}
