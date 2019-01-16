<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\theloai;


class TheLoaiController extends Controller
{
    //
    public function getDanhSach(){
        $dstheloai = theloai::all();
        return view('admin.theloai.danhsach',['dstheloai'=>$dstheloai]);
    }

    public function getThem(){
        return view('admin.theloai.them');
    }

    public function postThem(Request $request){
        $this->validate($request,
                        [
                        'Ten' => 'required | min: 5 | max: 255',
                        ],
                        [
                        'Ten.required' => 'Tên không được để trống.',
                        'Ten.min' => 'Tên phải quá ngắn.',
                        'Ten.max' => 'Tên phải quá dài.'
                        ]);
        $theloai = new theloai;
        $theloai->Ten = $request->Ten;
        $theloai->TenKhongDau = changeTitle($request->Ten);
        $theloai->save();

        return redirect('admin/theloai/them')->with('thongbao','Thêm thành công!');
    }

    public function getSua($id){
        $theloai = theloai::find($id);
        return view('admin.theloai.sua',['theloai'=>$theloai]);
    }

    public function postSua(Request $request, $id){
        $this->validate($request,
                        [
                        'Ten' => 'required | min: 5 | max: 255',
                        ],
                        [
                        'Ten.required' => 'Tên không được để trống.',
                        'Ten.min' => 'Tên phải quá ngắn.',
                        'Ten.max' => 'Tên phải quá dài.'
                        ]);
        $theloai = theloai::find($id);
        $theloai->Ten = $request->Ten;
        $theloai->TenKhongDau = changeTitle($request->Ten);
        $theloai->save();

        return redirect('admin/theloai/sua/'.$id)->with('thongbao','Sửa thành công!');
    }

    public function getXoa($id){
        $theloai = theloai::find($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach')->with('thongbao','Xóa thành công!');
    }

}
