<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function getDanhSach(){
        $dsusers = User::all();
        return view('admin.user.danhsach',['dsusers'=>$dsusers]);
    }

    public function getThem(){
        return view('admin.user.them');
    }

    public function postThem(Request $request){
        $this->validate($request,
                            [
                                'name' => 'required|min:5|max:255',
                                'email' => 'required|min:5|max:255|unique:users,email',
                                'password' => 'required|min:6|max:255',
                                'quyen' => 'required'
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
                                'quyen.required' => 'Bạn chưa chọn quyền.'
                            ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = $request->quyen;
        $user->save();

        return redirect('admin/user/them')->with('thongbao','Thêm thành công!');
    }

    public function getSua($id){
        $user = User::find($id);
        return view('admin.user.sua',['user'=>$user]);
    }   

    public function postSua(Request $request, $id){
        $this->validate($request,
                        [
                            'name' => 'required|min:5|max:255',
                            'quyen' => 'required'
                        ],
                        [   
                            'name.required' => 'Tên không được để trống.',
                            'name.min' => 'Tên qúa ngắn.',
                            'name.max' => 'Tên quá dài.',
                            'quyen.required' => 'Bạn chưa chọn quyền.'
                        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->quyen = $request->quyen;
        if ($request->changePassword == "on") {
            $this->validate($request,
            [
                'password' => 'required|min:6|max:255',
            ],
            [   
                'password.required' => 'Password không được để trống.',
                'password.min' => 'Password quá ngắn.',
                'password.max' => 'Password quá dài.',
            ]);
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect('admin/user/sua/'.$id)->with('thongbao','Sửa thành công!');
    }

    public function getXoa($id){
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/danhsach')->with('thongbao','Xóa thành công!');
    }


    public function getDangNhapAdmin(){
        return view('admin.dangnhap');
    }


    public function postDangNhapAdmin(Request $request){
        $this->validate($request,
                        [
                            'email' => 'required',
                            'password' => 'required|min:6|max:255'
                        ],  
                        [
                            'email.required' => 'Bạn chưa nhập e-mail.',
                            'password.required' => 'Bạn chưa nhập password.',
                            'password.min' => 'Password quá ngắn.',
                            'password.max' => 'Password quá dài.'
                        ]);
        $email = $request->email;
        $password = $request->password;
        
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect('admin/trangchu');
        }else{
            return redirect('admin')->with('thongbao','E-mail hoặc password không đúng!');
        }
    }

    public function getDangXuatAdmin(){
        Auth::logout();
        return redirect('admin');
    }
}
