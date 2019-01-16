<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\theloai;
use App\slide;
use App\loaitin;
use App\tintuc;
use App\comment;
use App\User;

class PagesController extends Controller
{
    //
    function __construct(){
        $dstheloai = theloai::all();
        $dsslide = slide::all();

        view()->share('dstheloai',$dstheloai);
        view()->share('dsslide',$dsslide);
    }
    public function trangchu(){
        return view('pages.trangchu');
    }

    public function gioithieu(){
        return view('pages.gioithieu');
    }

    public function lienhe(){
        return view('pages.lienhe');
    }
    
    public function getDangNhapUser(){
        return view('pages.dangnhap');
    }

    public function postDangNhapUser(Request $request){
        $this->validate($request,
                        [
                            'email' => 'required',
                            'password' => 'required|min:6|max:255'
                        ],
                        [
                            'email.required' => 'E-mail không được để trống.',
                            'password.required' => 'Password không được để trống.',
                            'password.min' => 'Password quá ngắn.',
                            'password.max' => 'Password quá dài.' 
                        ]);
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('/');
        }else{
            return redirect('dangnhap')->with('thongbao','Email hoặc mật khẩu không đúng.');
        }
    }

    public function getDangXuatUser(){
        Auth::logout();
        return redirect('/');
    }

    public function getDangKi(){
        return view('pages.dangki');
    }

    public function postDangKi(Request $request){
        $this->validate($request,
                [
                    'name' => 'required|min:5|max:255',
                    'email' => 'required|min:5|max:255|unique:users,email',
                    'password' => 'required|min:6|max:255',
                ],
                [   
                    'name.required' => 'Tên không được để trống.',
                    'name.min' => 'Tên qúa ngắn.',
                    'name.max' => 'Tên quá dài.',
                    'email.required' => 'E-mail không được để trống.',
                    'email.email' => 'Bạn chưa nhập đúng định dạng e-mail.',
                    'email.unique' => 'E-mail đã tồn tại.',
                    'password.required' => 'Password không được để trống.',
                    'password.min' => 'Password quá ngắn.',
                    'password.max' => 'Password quá dài.',
                ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = 0;
        $user->save();

        return redirect('dangki')->with('thongbao','Đăng kí thành công!');
    }

    public function getTaikhoan($id){
        $user = User::find($id);
        return view('pages.taikhoan',['user'=>$user]);
    }

    public function postTaikhoan(Request $request, $id){
        $this->validate($request,
        [
            'name' => 'required',
        ],
        [
            'name' => 'Họ tên không được để trống.',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        if ($request->checkpassword == "on") {
            $this->validate($request,
            [
                'password' => 'required|min:6|max:255'
            ],
            [
                'password.required' => 'Password không được để trống.',
                'password.min' => 'Password quá ngắn.',
                'password.max' => 'Password quá dài.' 
            ]);
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect('taikhoan/'.$id)->with('thongbao','Sửa thành công!');
    }

    public function loaitin($id){
        $loaitin = loaitin::find($id);
        $dstintuc = tintuc::where('idLoaiTin',$id)->paginate(5);
        return view('pages.loaitin')->with('dstintuc',$dstintuc)
                                    ->with('loaitin',$loaitin);
    }

    public function chitiet($id){
        $tintuc = tintuc::find($id);
        $tinnoibat = tintuc::where('NoiBat',1)->take(5)->get();
        $tinlienquan = tintuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(5)->get();
        $comments = comment::where('idTinTuc',$id)->get();
        $tinnoibat->shift();
        $tinlienquan->shift();
        return view('pages.chitiet')->with('tintuc',$tintuc)
                                    ->with('tinnoibat',$tinnoibat)
                                    ->with('tinlienquan',$tinlienquan)
                                    ->with('comments',$comments);
    }

    public function postTimKiem(Request $request){
        $tukhoa = $request->tukhoa;

        $dstintuc = tintuc::where('TieuDe','like','%'.$tukhoa.'%')
                            ->orWhere('TomTat','like','%'.$tukhoa.'%')
                            ->orWhere('NoiDung','like','%'.$tukhoa.'%')->take(30)->paginate(5);
        
        return view('pages.timkiem')->with('dstintuc',$dstintuc)
                                        ->with('tukhoa',$tukhoa);
    }
}
