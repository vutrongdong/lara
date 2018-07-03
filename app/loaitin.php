<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaitin extends Model
{
    //liên kết model tới bảng loại tin
    protected $table = 'loaitin';
    //liên kết một một từ bảng con là loại tin tới bảng cha là Thể lọa
    public function theloai(){
    	return $this->belongsTo('App\theloai','idTheLoai','id');
    }
    // liên kết loaitin với tintuc xem có 1 loaitin có bao nhiêu tintuc
    public function tintuc(){
    	return $this->hasMany('App\tintuc','idLoaiTin','id');
    }
}
