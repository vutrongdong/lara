<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //liên kêt tới bảng comment
    protected $table = 'comment';
    //liên kết từ bảng comment , 1 comment từ 1 tin tức
    public function tintuc(){
    	return $this->belongsTo('App\tintuc','idTinTuc','id');
    }
    //một user có nhiều comment khác nhau
    public function user(){
    	return $this->belongsTo('App\comment','idUser','id');
    }
}
