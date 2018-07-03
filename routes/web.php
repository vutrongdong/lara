<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});
//test liên kết các bảng và xuất dữ liệu của bảng
use App\theloai;
Route::get('thu',function(){
	$theloai = theloai::find(3);
	foreach($theloai->loaitin as $loaitin){
		echo "<p style='color:red;'>".$loaitin->Ten.'<br>'.'<hr>'."</p>";
		foreach($loaitin->tintuc as $tintuc){
			echo $tintuc->TieuDe.'<br>';
		}
	}
});
//view
Route::get('test',function(){
	return view('admin.loaitin.danhsach');
});

//prefix dùng để tạo route group
Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'theloai'],function(){
		//admin/theloai/danhsach
		Route::get('danhsach','TheLoaiController@getDanhSach');
		//admin/theloai/sua
		Route::get('sua/{id}','TheLoaiController@getSua');
		//admin/theloai/them
		Route::post('sua/{id}','TheLoaiController@postSua');
		
		Route::get('them','TheLoaiController@getThem');
		//post dùng để gửi dữ liệu lên server và server sẽ giúp chỉnh them theloai
		Route::post('them','TheLoaiController@postThem');

		Route::get('xoa/{id}','TheLoaiController@getXoa');
	});
	Route::group(['prefix'=>'tintuc'],function(){
		//admin/tintuc/danhsach
		Route::get('danhsach','TinTucController@getDanhSach');
		//admin/tintuc/sua
		Route::get('sua','TinTucController@getSua');
		//admin/tintuc/them
		Route::get('them','TinTucController@getThem');
		Route::post('them','TinTucController@postThem');
	});
	Route::group(['prefix'=>'user'],function(){
		//admin/user/danhsach
		Route::get('danhsach','UserController@getDanhSach');
		//admin/user/sua
		Route::get('sua','UserController@getSua');
		//admin/user/them
		Route::get('them','UserController@getThem');
	});
	Route::group(['prefix'=>'loaitin'],function(){
		//admin/loaitin/danhsach
		Route::get('danhsach','LoaiTinController@getDanhSach');
		//admin/loaitin/sua
		Route::get('sua/{id}','LoaiTinController@getSua');
		//admin/loaitin/them
		Route::post('sua/{id}','LoaiTinController@postSua');
		
		Route::get('them','LoaiTinController@getThem');
		//post dùng để gửi dữ liệu lên server và server sẽ giúp chỉnh them LoaiTin
		Route::post('them','LoaiTinController@postThem');

		Route::get('xoa/{id}','LoaiTinController@getXoa');
	});

	Route::group(['prefix'=>'ajax'],function(){
		Route::get('loaitin/{idtheloai}','AjaxController@getLoaiTin');
	});
});