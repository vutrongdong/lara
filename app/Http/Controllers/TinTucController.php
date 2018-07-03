<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tintuc;
use App\loaitin;
use App\theloai;

class TinTucController extends Controller
{
    //
    public function getDanhSach(){
    	$tintuc = tintuc::orderBy('id','DESC')->get();
    	return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }
    public function getThem(){
    	$loaitin = loaitin::all();
    	$theloai = theloai::all();
    	return view('admin.tintuc.them',['loaitin'=>$loaitin],['theloai'=>$theloai]);
    }
    public function postThem(Request $request){
    	$this->validate($request,
    		[
    			'loaitin'=>'required',
    			'tieude'=>'required|min:3|max:100|unique:tintuc|TieuDe',
    			'tomtat'=>'required',
    			'noidung'=>'required',
    			'img'=>'required'
    		],
    		[
    			'loaitin.required'=>'bạn chưa nhap loại tin',
    			'tieude.required'=>'bạn chưa nhập tiêu đề',
    			'tieude.min'=>'tiêu đề phải có độ dài từ 3 đến 100 kí tự',
    			'tieude.max'=>'tiêu đề phải có độ dài từ 3 đến 100 kí tự',
    			'tieude.unique'=>'tiêu đề này đã có rồi',
    			'tomtat.required'=>'không được đề trường tóm tắt là trống',
    			'noidung.required'=>'không được để nội dung là rỗng',
    			'img.required'=>'bạn phải có một ảnh'
    		]
    	);
    }
    public function getSua($id){

    }
    public function postSua(Request $request){

    }
    public function Xoa(){

    }
}
