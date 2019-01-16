<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaitin;
use App\theloai;

class AjaxController extends Controller
{
    //
    public function getLoaiTin($id){
        $dsloaitin = theloai::find($id)->loaitin;

        foreach ($dsloaitin as  $item) {
            echo '<option value="'.$item->id.'">'.$item->Ten.'</option>';
        }
    }
}
