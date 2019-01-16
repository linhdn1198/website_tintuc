<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tintuc;
use App\loaitin;
use App\theloai;

class TinTucController extends Controller
{
    //
    public function getDanhSach(){
        $dstintuc = tintuc::all();
        return view('admin.tintuc.danhsach',['dstintuc'=>$dstintuc]);
    }

    public function getThem(){
        $dstheloai = theloai::all();
        $theloai = theloai::first();
        $dsloaitin = $theloai->loaitin;
        return view('admin.tintuc.them',['dstheloai'=>$dstheloai,'dsloaitin'=>$dsloaitin]);
    }

    public function postThem(Request $request){
        $this->validate($request,
                        [
                            'TieuDe' => 'required|min:5|max:255',
                            'TomTat' => 'required|min:20',
                            'NoiDung' => 'required|min:20'
                        ],
                        [   
                            'TieuDe.required' => 'Tiêu đề không được để trống.',
                            'TieuDe.min' => 'Tiêu đề quá ngắn.',
                            'TieuDe.max' => 'Tiêu đề quá dài',
                            'TomTat.required' => 'Tóm tắt không được để trống.',
                            'TomTat.min' => 'Tóm tắt quá ngắn.',
                            'NoiDung.required' => 'Nội dung không được để trống.',
                            'NoiDung.min' => 'Nội dung quá ngắn.'
                        ]);
        $tintuc = new tintuc;
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->idLoaiTin = $request->idLoaiTin;
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        if ($request->hasFile('Hinh')) {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();

            if($duoi!='jpg' && $duoi !='png' && $duoi='jpeg'){
                return redirect('admin/tintuc/them')->with('loi','File không hợp lệ!');
            }

            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;

            while(file_exists("upload/tintuc/".$Hinh)){
                $Hinh = str_random(4)."_".$name;
            }

            $file->move("upload/tintuc",$Hinh);
            unlink("upload/tintuc/".$tintuc->Hinh);
            $tintuc->Hinh = $Hinh;
        }else{
            if(empty($tintuc->Hinh))
            {
                $tintuc->Hinh = "";
            }
        }
        $tintuc->NoiBat = $request->NoiBat;
        $tintuc->save();

        return redirect('admin/tintuc/them')->with('thongbao','Thêm thành công!');
    }

    public function getSua($id){
        $dstheloai = theloai::all();
        $dsloaitin = loaitin::all();
        $tintuc = tintuc::find($id);
        return view('admin.tintuc.sua',['tintuc'=>$tintuc,'dstheloai'=>$dstheloai,'dsloaitin'=>$dsloaitin]);
    }

    public function postSua(Request $request, $id){
        $this->validate($request,
                        [
                            'TieuDe' => 'required|min:5|max:255',
                            'TomTat' => 'required|min:20',
                            'NoiDung' => 'required|min:20'
                        ],
                        [   
                            'TieuDe.required' => 'Tiêu đề không được để trống.',
                            'TieuDe.min' => 'Tiêu đề quá ngắn.',
                            'TieuDe.max' => 'Tiêu đề quá dài',
                            'TomTat.required' => 'Tóm tắt không được để trống.',
                            'TomTat.min' => 'Tóm tắt quá ngắn.',
                            'NoiDung.required' => 'Nội dung không được để trống.',
                            'NoiDung.min' => 'Nội dung quá ngắn.'
                        ]);
        $tintuc = tintuc::find($id);
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->idLoaiTin = $request->idLoaiTin;
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;

        if ($request->hasFile('Hinh')) {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();

            if($duoi!='jpg' && $duoi !='png' && $duoi='jpeg'){
                return redirect('admin/tintuc/sua/'.$id)->with('loi','File không hợp lệ!');
            }

            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;

            while(file_exists("upload/tintuc/".$Hinh)){
                $Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/tintuc",$Hinh);
            unlink("upload/tintuc/".$tintuc->Hinh);
            $tintuc->Hinh = $Hinh;
        }else{
            if(empty($tintuc->Hinh))
            {
                $tintuc->Hinh = "";
            }
        }

        $tintuc->NoiBat = $request->NoiBat;
        $tintuc->save();

        return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Sửa thành công!');
    }

    public function getXoa($id){
        $tintuc = tintuc::find($id);
        $tintuc->delete();
        return redirect('admin/tintuc/danhsach')->with('thongbao','Xóa thành công!');
    }
}
