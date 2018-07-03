<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaitin;
use App\theloai;

class LoaiTinController extends Controller
{
    //
    public function getDanhSach(){
    	$loaitin = loaitin::all();
    	return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }
    public function getXoa($id){
    	$loaitin = loaitin::find($id);
    	$loaitin->delete();

    	return redirect('admin/loaitin/danhsach')->with('thongbaoxoa','bạn đã xóa thành công');
    }
    public function getThem(){
    	$theloai = theloai::all();
    	return view('admin.loaitin.them',['theloai'=>$theloai]);
    }
    public function postThem(Request $request){
    	$this->validate($request,
    		[
    			'Ten'=>'required|min:3|max:100|unique:loaitin,Ten',
    			'theloai'=>'required'
    	],
    	[
    		'Ten.required'=>'bạn cần nhập tên',
    		'Ten.min'=>'Ten loại tin phải có kích thước từ 3 đến 100 kí tự',
    		'Ten.max'=>'Ten loại tin phải có kích thước từ 3 đến 100 kí tự',
    		'Ten.unique'=>'Ten không được trùng',
    		'theloai.required'=>'bạn chọn một thể loại'
    	]);
    	$loaitin = new loaitin;
    	$loaitin->Ten = $request->Ten;
    	$loaitin->TenKhongDau = changeTitle($request->Ten);
    	$loaitin->idTheLoai = $request->theloai;
    	$loaitin->save();

    	return redirect('admin/loaitin/them')->with('thongbaothem','thêm thành công');
    }
    public function getSua($id){
    	$loaitin = loaitin::find($id);
    	$theloai = theloai::all();
    	return view('admin.loaitin.sua',['loaitin'=>$loaitin],['theloai'=>$theloai]);
    }
    public function postSua(Request $request,$id){
    	    	$this->validate($request,
    		[
    			'Ten'=>'required|min:3|max:100|unique:loaitin,Ten',
    			'theloai'=>'required'
    	],
    	[
    		'Ten.required'=>'bạn cần nhập tên',
    		'Ten.min'=>'Ten loại tin phải có kích thước từ 3 đến 100 kí tự',
    		'Ten.max'=>'Ten loại tin phải có kích thước từ 3 đến 100 kí tự',
    		'Ten.unique'=>'Ten không được trùng',
    		'theloai.required'=>'bạn chọn một thể loại'
    	]);

    	 $loaitin = loaitin::find($id);
    	 $loaitin->Ten = $request->Ten;
    	 $loaitin->TenKhongDau = changeTitle($request->Ten);
    	 $loaitin->idTheLoai = $request->theloai;
    	 $loaitin->save();

    	 return redirect('admin/loaitin/sua/'.$id)->with('thongbaosua','bạn đã sửa thành công');
    }
}
