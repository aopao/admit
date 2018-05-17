<?php

namespace App\Http\Controllers\Admin;

use App\Models\College;
use DB;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CollegeCategory;
use App\Models\CollegeAdmitc;

class TranformMongoToMysqlController extends Controller
{
	private $mongo;
	private $category = [
		'工科类' => 1 , '艺术类' => 2 , '军事类' => 3 , '综合类' => 4 , '农林类' => 5 , '理工类' => 6 , '医学类' => 7 , '财经类' => 8 , '医药类' => 9 , '师范类' => 10 , '政法类' => 11 , '林业类' => 12 , '语言类' => 13 , '体育类' => 14 , '民族类' => 15 , '农业类' => 16 ,
	];
	private $province = [ '北京市' => 1 ,
		'天津市' => 2 ,
		'河北省' => 3 ,
		'山西省' => 4 ,
		'内蒙古自治区' => 5 ,
		'辽宁省' => 6 ,
		'吉林省' => 7 ,
		'黑龙江省' => 8 ,
		'上海市' => 9 ,
		'江苏省' => 10 ,
		'浙江省' => 11 ,
		'安徽省' => 12 ,
		'福建省' => 13 ,
		'江西省' => 14 ,
		'山东省' => 15 ,
		'河南省' => 16 ,
		'湖北省' => 17 ,
		'湖南省' => 18 ,
		'广东省' => 19 ,
		'广西壮族自治区' => 20 ,
		'海南省' => 21 ,
		'重庆市' => 22 ,
		'四川省' => 23 ,
		'贵州省' => 24 ,
		'云南省' => 25 ,
		'西藏自治区' => 26 ,
		'陕西省' => 27 ,
		'甘肃省' => 28 ,
		'青海省' => 29 ,
		'宁夏回族自治区' => 30 ,
		'新疆维吾尔自治区' => 31 ,
		'台湾省' => 32 ,
		'澳门特别行政区' => 33 ,
		'香港特别行政区' => 34 , ];

	public function __construct()
	{
	}

	public function index()
	{
		exit('已经完毕啦');
		$res = DB::connection('mongodb')->collection('lis')->take(100)->get()->Toarray();
		DB::connection('mongodb')->collection('bbb')->insert($res);
	}

	public function mm()
	{
//		$sql = "SELECT * FROM `college_admitc` WHERE `college_id`  REGEXP '大学'";
//		$res = DB::select($sql);
		$res = CollegeAdmitc::where('college_id' , 'regexp' , "大学")->limit(100)->get()->toArray();
		foreach ($res as $item) {
			$im = explode('（' , $item[ 'college_id' ]);
			$college_name = $im[ 0 ];
			$info = College::where('﻿college_name' , $college_name)->first();
			if (!empty($info)) {
				$id = $info[ 'id' ];
				$admit = new CollegeAdmitc();
				$admit->where('college_id' , $item[ 'college_id' ])->update([ 'college_id' => $id ]);
				echo $id.'#########'.$college_name . "*********".$item[ 'college_id' ]."********数据已经更新<br>";
			} else {
				$data = [
					'﻿college_name' => $college_name ,
					'province_id' => 0 ,
					'city_id' => 0
				];
				College::create($data);
				echo $college_name . "新建成功!!<br>";
//				$sql = "UPDATE `college_admitc` SET college_id=" . $res[ 'id' ] . " WHERE college_id LIKE '%" . $college_name . "%'";
//				$res = DB::update($sql);
			}
		}
		print_r('Done');

	}

	public function admitToMysql()
	{
		$res = DB::connection('mongodb')->collection('list')->take(2000)->get()->Toarray();
		DB::table('college_admitc')->insert($res);
		print_r('插入成功!');
	}

	public function collegeToMysql(Request $request)
	{
		exit('已经添加啦');
		$res = DB::connection('mongodb')->collection('list')->skip(4092)->take(399)->get()->Toarray();
		foreach ($res as $key => $item) {
			$city_id = $this->getCItyId($item[ 'city' ]);
			$data[ '﻿college_name' ] = $item[ 'school' ];
			$data[ 'province_id' ] = $this->province[ $item[ 'provinces' ] ];
			$data[ 'city_id' ] = $city_id;
			if (isset($item[ 'type' ])) {
				$data[ 'category_id' ] = $this->category[ $item[ 'type' ] ];
			} else {
				$data[ 'category_id' ] = null;
			}
			$data[ 'is_top_college' ] = $item[ 'or985' ];
			$data[ 'admission' ] = $item[ 'admit' ];
			$data[ 'admission_detail' ] = $item[ 'admit_info' ];
			$data[ '﻿admission_scale' ] = $item[ 'scale' ];
			College::create($data)->save();
			print_r($key , '-------写入成功');
		}
		print_r('1000条导入成功');
	}

	public function getCItyId($province_name)
	{
		$res = City::where('name' , $province_name)->pluck('id');
		if (isset($res[ 0 ])) {
			return $res[ 0 ];
		} else {
			return 0;
		}

	}

	public function collegeCategoryToMysql()
	{
		exit('已经添加了,暂不执行');
//		foreach ($this->category as $key => $item) {
//			$data = [
//				'category_name' => $key ,
//				'category_desc' => ''
//			];
//			CollegeCategory::create($data)->save();
//		}
	}

	public function collegeCategoryMysqlToMongo()
	{
		exit('已经添加了,暂不执行');
//		$college_list = College::select('id' , '﻿college_name')->get()->toArray();
//		$college_list = array_pluck($college_list , 'id' , '﻿college_name');
//		foreach ($college_list as $key => $item) {
//			$data = [
//				'id' => $item ,
//				'college' => $key
//			];
//			DB::connection('mongodb')->collection('cid')->insert($data);
//		}
	}
}
