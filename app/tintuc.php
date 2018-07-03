<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tintuc extends Model
{
    //liên kết model tới bảng tintuc
    protected $table = 'tintuc';
    //liên kết bảng tin tức tới bảng loại tin với liên kết một một
    public function loaitin(){
    	return $this->belongsTo('App\loaitin','idLoaiTin','id');
    }
    //trong một tin tức có nhiều comment
    public function comment(){
    	return $this->hasMany('App\comment','idTinTuc','id');
    }
}
