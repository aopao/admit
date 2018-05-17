<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollegeAdmitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	//NEW
		Schema::create('college_admits', function (Blueprint $table) {
			$table->increments('id');
			$table->string('college')->index();
			$table->string('province')->index();
			$table->string('year')->index();
			$table->string('major')->index()->nullable()->comment('专业名称');
			$table->string('college_batch')->nullable()->comment('批次名称');
			$table->string('subject')->nullable()->comment('文科理科');
			$table->integer('paln_number')->default(0);
			$table->integer('﻿lowest_score')->default(0);
			$table->integer('﻿lowest_rank')->default(0);
			$table->integer('﻿lowest_line')->default(0);
			$table->integer('average_score')->default(0);
			$table->integer('average_rank')->default(0);
			$table->integer('average_line')->default(0);
			$table->string('advantage')->unllable();
			$table->string('explain')->unllable();
			$table->timestamps();
		});
		//OLD
//        Schema::create('college_admits', function (Blueprint $table) {
//            $table->increments('id');
//			$table->integer('college_id')->index();
//			$table->integer('province_id')->index();
//			$table->integer('year_id')->index();
//			$table->integer('major_id')->index()->nullable()->comment('专业id');
//			$table->string('major')->index()->nullable()->comment('如果没有专业 ID, 则直接写专业名称');
//			$table->integer('college_batch_id')->index()->nullable()->comment('批次id');
//			$table->string('college_batch')->nullable()->comment('如果没有批次 ID, 则直接写批次名称');
//			$table->boolean('subject')->default(0)->comment('0:文科1:理科');
//			$table->integer('paln_number')->default(0);
//			$table->integer('﻿lowest_score')->default(0);
//			$table->integer('﻿lowest_rank')->default(0);
//			$table->integer('﻿lowest_line')->default(0);
//			$table->integer('average_score')->default(0);
//			$table->integer('average_rank')->default(0);
//			$table->integer('average_line')->default(0);
//			$table->string('advantage')->unllable();
//			$table->string('explain')->unllable();
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('college_admits');
    }
}
