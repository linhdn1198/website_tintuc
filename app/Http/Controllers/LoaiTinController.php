<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaitin;
use App\theloai;

class LoaiTinController extends Controller
{
    //
    public function getDanhSach(){
        $dsloaitin = loaitin::all();
        return view('admin.loaitin.danhsach',['dsloaitin'=>$dsloaitin]);
    }

    public function getThem(){
        $dstheloai = theloai::all();
        return view('admin.loaitin.them',['dstheloai' => $dstheloai]);
    }   

    public function postThem(Request $request){
        $this->validate($request,
                        [
                            'Ten' => 'required | min:5 | max:255' 
                        ],
                        [
                            'Ten.required' => 'Tên không được bỏ trống.',
                            'Ten.min' => 'Tên quá ngắn.',
                            'Ten.max' => 'Tên quá dài.'
                        ]);
        
        $loaitin = new loaitin;
        $loaitin->Ten = $request->Ten;
        $loaitin->TenKhongDau = changeTitle($request->Ten);
        $loaitin->idTheLoai = $request->idTheLoai;
        $loaitin->save();

        return redirect('admin/loaitin/them')->with('thongbao','Thêm thành công!');
    }

    public function getSua($id){
        $loaitin = loaitin::find($id);
        $dstheloai = theloai::all();
        return view('admin.loaitin.sua',['loaitin' => $loaitin, 'dstheloai'=>$dstheloai]);
    }

    public function postSua(Request $request, $id){
        $this->validate($request,
                        [
                            'Ten' => 'required | min:5 | max:255' 
                        ],
                        [
                            'Ten.required' => 'Tên không được bỏ trống.',
                            'Ten.min' => 'Tên quá ngắn.',
                            'Ten.max' => 'Tên quá dài.'
                        ]);

        $loaitin = loaitin::find($id);
        $loaitin->Ten = $request->Ten;
        $loaitin->TenKhongDau = changeTitle($request->Ten);
        $loaitin->idTheLoai = $request->idTheLoai;
        $loaitin->save();

        return redirect('admin/loaitin/sua/'.$id)->with('thongbao','Sửa thành công!');
    }

    public function getXoa($id){
        $loaitin = loaitin::find($id);
        $loaitin->delete();

        return redirect('admin/loaitin/danhsach')->with('thongbao','Xóa thành công!');
    }
}
