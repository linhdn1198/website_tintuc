<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide;
class SlideController extends Controller
{
    //
    public function getDanhSach(){
        $dsslide = slide::all();
        return view('admin.slide.danhsach',['dsslide'=>$dsslide]);
    }

    public function getThem(){
        return view('admin.slide.them');
    }

    public function postThem(Request $request){
        $this->validate($request,
                        [
                            'Ten' => 'required|min:5|max:255',
                            'NoiDung' => 'required|min:5'
                        ],
                        [
                            'Ten.required' => 'Tên không được để trống.',
                            'Ten.min' => 'Tên slide quá ngắn.',
                            'Ten.max' => 'Tên slide quá dài.',
                            'NoiDung.required' => 'Nội dung không được để trống.',
                            'NoiDung.min' => 'Nội dung quá ngắn.',
                        ]);
        $slide = new slide;
        $slide->Ten = $request->Ten;

        if ($request->hasFile('Hinh')) {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();

            if($duoi!='jpg' && $duoi !='png' && $duoi='jpeg'){
                return redirect('admin/slide/them')->with('loi','File không hợp lệ!');
            }

            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;

            while(file_exists("upload/slide/".$Hinh)){
                $Hinh = str_random(4)."_".$name;
            }

            $file->move("upload/slide",$Hinh);
            //unlink("upload/slide/".$slide->Hinh);
            $slide->Hinh = $Hinh;
        }else{
            if(empty($slide->Hinh))
            {
                $slide->Hinh = "";
            }
        }
        $slide->link = '';
        $slide->NoiDung = $request->NoiDung;
        $slide->save();

        return redirect('admin/slide/them')->with('thongbao','Thêm thành công!');
    }

    public function getSua(Request $request, $id){
        $slide = slide::find($id);
        return view('admin.slide.sua',['slide'=>$slide]);
    }

    public function postSua(Request $request, $id){
        $this->validate($request,
                        [
                            'Ten' => 'required|min:5|max:255',
                            'NoiDung' => 'required|min:5'
                        ],
                        [
                            'Ten.required' => 'Tên không được để trống.',
                            'Ten.min' => 'Tên slide quá ngắn.',
                            'Ten.max' => 'Tên slide quá dài.',
                            'NoiDung.required' => 'Nội dung không được để trống.',
                            'NoiDung.min' => 'Nội dung quá ngắn.',
                        ]);
        $slide = slide::find($id);
        $slide->Ten = $request->Ten;

        if ($request->hasFile('Hinh')) {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();

            if($duoi!='jpg' && $duoi !='png' && $duoi='jpeg'){
                return redirect('admin/slide/sua/'.$id)->with('loi','File không hợp lệ!');
            }

            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;

            while(file_exists("upload/slide/".$Hinh)){
                $Hinh = str_random(4)."_".$name;
            }

            $file->move("upload/slide",$Hinh);
            unlink("upload/slide/".$slide->Hinh);
            $slide->Hinh = $Hinh;
        }else{
            if(empty($slide->Hinh))
            {
                $slide->Hinh = "";
            }
        }
        
        $slide->link = '';
        $slide->NoiDung = $request->NoiDung;
        $slide->save();

        return redirect('admin/slide/sua/'.$id)->with('thongbao','Sửa thành công!');
    }

    public function getXoa($id){
        $slide = slide::find($id);
        $slide->delete();

        return redirect('admin/slide/danhsach')->with('thongbao','Xóa thành công!');
    }
}
