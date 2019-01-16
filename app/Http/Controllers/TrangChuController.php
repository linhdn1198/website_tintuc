<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\theloai;
use App\loaitin;
use App\tintuc;
use App\slide;
use App\comment;
use App\User;

class TrangChuController extends Controller
{
    //

    public function index(){
        $theloai = count(theloai::all());
        $loaitin = count(loaitin::all());
        $tintuc = count(tintuc::all());
        $slide = count(slide::all());
        $comment = count(comment::all());
        $user = count(User::all());

        return view('admin.trangchu')->with('theloai',$theloai)
                                    ->with('loaitin',$loaitin)
                                    ->with('tintuc',$tintuc)
                                    ->with('slide',$slide)
                                    ->with('comment',$comment)
                                    ->with('user',$user);
    }
}
