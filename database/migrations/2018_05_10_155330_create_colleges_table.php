<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollegesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('colleges' , function(Blueprint $table) {
			$table->increments('id');
			$table->string('﻿college_name')->index();
			$table->integer('﻿provinces_id')->index();
			$table->integer('city_id')->unllable()->index();
			$table->integer('genre_id')->unllable()->index()->comment('科类|eg:工科类');
			$table->boolean('is_top_college')->default(0)->comment('是否是一流大学985 OR 211');
			$table->text('admission')->unllable();
			$table->text('admission_detail')->unllable();
			$table->text('﻿admission_scale')->unllable();
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
		Schema::dropIfExists('colleges');
	}
}
