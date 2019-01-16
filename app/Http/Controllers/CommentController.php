<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\comment;
use App\tintuc;
class CommentController extends Controller
{
    //
    public function getDanhSach(){
        $dscomment = comment::all();
        return view('admin.comment.danhsach',['dscomment'=>$dscomment]);
    }

    public function getXoa($id){
        $comment = comment::find($id);
        $comment->delete();
        return redirect('admin/comment/danhsach')->with('thongbao','Xóa thành công!');
    }

    public function postComment(Request $request, $id){
        $idTinTuc = $id;
        $tintuc = tintuc::find($idTinTuc);
        $comment = new comment;
        $comment->idTinTuc =  $idTinTuc;
        $comment->idUser = Auth::user()->id;
        $comment->NoiDung = $request->NoiDung;
        $comment->save();

        return redirect('chitiet/'.$id.'/'.$tintuc->TieuDeKhongDau.'.html')->with('thongbao','Viết thành công!');
    }
}
