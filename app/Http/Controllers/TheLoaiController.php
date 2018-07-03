<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\theloai;
class TheLoaiController extends Controller
{
    //danh sach
    public function getDanhSach(){
    	$theloai = theloai::all();
    	return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }
    //getthem
    public function getThem(){
    	return view('admin.theloai.them');
    }
        //postThem- dung Request để nhận dữ liệu từ form
   	public function postThem(Request $request){
   		//Ten là Name ở input
   		// echo $request->Ten;
   		// dùng hàm validate để kiểm tra các điều kiện
   		$this->validate($request,
   			[
   				//các điều kiện : ít nhất là 3 kí tự và nhiều nhất là 100 kì tự
   				'Ten'=>'required|unique:theloai,Ten|min:3|max:100'
   			],
   			[
   				//thông báo lỗi -> nếu rỗng
   				'Ten.required'=>'bạn chưa nhập tên thể loại',
   				'Ten.min'=>'số kí tự quá ít',
   				'Ten.max'=>'số kí tự quá nhiều',
   				'Ten.unique'=>'Tên đã tồn tại'
   			]
   		);
   		//sau khi bắt lỗi xong thì lấy cái dữ liệu tên lưu vào model theloai
   		//$theloai được lấy gía trị từ database thông qua model
   		$theloai = new theloai;
   		$theloai->Ten = $request->Ten;
   		$theloai->TenKhongDau = changeTitle($request->Ten);
   		$theloai->save();

   		return redirect('admin/theloai/them')->with('thongbao','Thêm Mới Thành Công');
   	}
    //getsua
    public function getSua($id){
    	$theloai = theloai::find($id);
    	return view('admin.theloai.sua',['theloai'=>$theloai]);
    }
    //post
    public function postSua(Request $request,$id){
    	$theloai = theloai::find($id);
    	///truyền request vào để kiểm tra
    	$this->validate($request,
    		//mảng các điều kiện để check lỗi
    		[
    			//required được dùng để kiểm tra xem người dùng có nhập vào không
    			//unique dùng để kiểm tra xem có bị trùng tên với các tên khác không
    			'Ten'=>'required|unique:theloai,Ten|min:3|max:100'
    		],
    		//các thông báo muốn hiển thị
    		[
    			'Ten.required'=>'bạn chưa nhập gì',
    			'Ten.unique'=>'tên này đã bị trùng',
    			'Ten.min'=>'tên thể loại phải có độ dài từ 3 đến 100 kí tự',
    			'Ten.max'=>'tên thể loại phải có độ dài từ 3 đến 100 kí tự'
    		]);
    	$theloai->Ten = $request->Ten;
    	$theloai->TenKhongDau = changeTitle($request->Ten);
    	$theloai->save();
    	return redirect('admin/theloai/sua/'.$id)->with('thongbao','bạn đã sửa thành công');
    }


    public function getXoa($id){
    	$theloai = theloai::find($id);
    	$theloai->delete();

    	return redirect('admin/theloai/danhsach')->with('thongbaoxoa','bạn đã xóa thành công');
    }




}
