<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class theloai extends Model
{
    //liên kết model tới bảng thể loại
    protected $table = 'theloai';
    //liên kết một nhiều từ bảng theloai tơi bảng loaitin
    public function loaitin(){
    	return $this->hasMany('App\loaitin','idTheLoai','id');
    }
    //liên kết bảng tintuc với bảng theloai thông qua bảng loaitin
    public function tintuc(){
    	return $this->hasManyThrough('App\tintuc','App\loaitin','idTheLoai','idLoaiTin','id');
    }
}
