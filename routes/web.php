<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('admin','UserController@getDangNhapAdmin');
Route::post('admin/dangnhap','UserController@postDangNhapAdmin');
Route::get('admin/dangxuat','UserController@getDangXuatAdmin');


Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {

    Route::get('trangchu', 'TrangChuController@index');

    Route::group(['prefix' => 'theloai'], function () {

        Route::get('danhsach', 'TheLoaiController@getDanhSach');

        Route::get('them', 'TheLoaiController@getThem');
        Route::post('postThem', 'TheLoaiController@postThem');

        Route::get('sua/{id}', 'TheLoaiController@getSua');
        Route::post('postSua/{id}', 'TheLoaiController@postSua');

        Route::get('xoa/{id}', 'TheLoaiController@getXoa');

    });

    Route::group(['prefix' => 'loaitin'], function () {

        Route::get('danhsach', 'LoaiTinController@getDanhSach');

        Route::get('them', 'LoaiTinController@getThem');
        Route::post('postThem', 'LoaiTinController@postThem');

        Route::get('sua/{id}', 'LoaiTinController@getSua');
        Route::post('postSua/{id}', 'LoaiTinController@postSua');

        Route::get('xoa/{id}', 'LoaiTinController@getXoa');

    });

    Route::group(['prefix' => 'tintuc'], function () {

        Route::get('danhsach', 'TinTucController@getDanhSach');

        Route::get('them', 'TinTucController@getThem');
        Route::post('postThem', 'TinTucController@postThem');

        Route::get('sua/{id}', 'TinTucController@getSua');
        Route::post('postSua/{id}', 'TinTucController@postSua');

        Route::get('xoa/{id}', 'TinTucController@getXoa');

    });

    Route::group(['prefix' => 'comment'], function () {
        Route::get('danhsach', 'CommentController@getDanhSach');

        Route::get('xoa/{id}', 'CommentController@getXoa');
    });
    
    Route::group(['prefix' => 'user'], function () {

        Route::get('danhsach', 'UserController@getDanhSach');

        Route::get('them', 'UserController@getThem');
        Route::post('postThem', 'UserController@postThem');

        Route::get('sua/{id}', 'UserController@getSua');
        Route::post('postSua/{id}', 'UserController@postSua');

        Route::get('xoa/{id}', 'UserController@getXoa');

    });

    Route::group(['prefix' => 'slide'], function () {

        Route::get('danhsach', 'SlideController@getDanhSach');

        Route::get('them', 'SlideController@getThem');
        Route::post('postThem', 'SlideController@postThem');

        Route::get('sua/{id}', 'SlideController@getSua');
        Route::post('postSua/{id}', 'SlideController@postSua');

        Route::get('xoa/{id}', 'SlideController@getXoa');

    });

    Route::group(['prefix' => 'ajax'], function () {
        Route::get('loaitin/{id}', 'AjaxController@getLoaiTin');
    });
});



Route::get('/', 'PagesController@trangchu');
Route::get('gioithieu', 'PagesController@gioithieu');
Route::get('lienhe', 'PagesController@lienhe');

Route::get('dangki', 'PagesController@getDangKi');
Route::post('dangki', 'PagesController@postDangKi');

Route::get('taikhoan/{id}', 'PagesController@getTaikhoan');
Route::post('taikhoan/{id}', 'PagesController@postTaikhoan');

Route::get('dangnhap', 'PagesController@getDangNhapUser');
Route::post('dangnhap', 'PagesController@postDangNhapUser');

Route::get('dangxuat', 'PagesController@getDangXuatUser');

Route::post('timkiem','PagesController@postTimKiem');

Route::get('loaitin/{id}/{TenKhongDau}.html', 'PagesController@loaitin');
Route::get('chitiet/{id}/{TenKhongDau}.html', 'PagesController@chitiet');

Route::post('comment/{id}','CommentController@postComment');


