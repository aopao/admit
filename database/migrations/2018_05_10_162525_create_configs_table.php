<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('configs' , function(Blueprint $table) {
			$table->increments('id');
			$table->string('key')->unique();
			$table->string('value')->nullable();
			$table->string('display_name')->nullable()->comment('明文识别文字');
			$table->timestamps();
		});
		/** 插入初始化信息 **/
		$this->inserInitData();
	}

	public function inserInitData()
	{
		$data = [
			[ 'key' => 'web_name' , 'value' => '黑马高考' ] ,
			[ 'key' => 'copyright' , 'value' => '黑马高考版权' ] ,
			[ 'key' => 'login_message' , 'value' => '登录界面提示语句' ] ,
		];
		DB::table('configs')->insert($data);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('configs');
	}
}
