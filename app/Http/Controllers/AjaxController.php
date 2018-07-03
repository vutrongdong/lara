<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaitin;

class AjaxController extends Controller
{
    //
    public function getLoaiTin($idtheloai){
    	$loaitin = loaitin::where('idTheLoai',$idtheloai)->get();
    	foreach($loaitin as $lt){
    		?>
    		<option value="<?php echo $lt->id; ?>"><?php echo $lt->Ten; ?></option>
    		<?php
    	}
    }
}
