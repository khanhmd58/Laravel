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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('user', function () { // địa chỉ đích để chạy, khi chạy ra đích nó có dạng http://localhost/laravelk44/user
//     return view('admin.user.list'); // đường dẫn tới thư mục view
// });
Route::get('list','Admin\UserController@getList')->name('user.list');//đường dẫn list là phương thức get tên function là getlist bên controller  ->name():đặt tên
Route::get('create','Admin\UserController@getCreate')->name('user.create');
Route::post('store','Admin\UserController@postStore')->name('user.store');
Route::get('login','validate\demoValidate@getForm')->name('login')->middleware('CheckLogin');
Route::post('login','validate\demoValidate@validateForm');
Route::get('admin','validate\demoValidate@admin')->name('getList')->middleware('CheckAdmin');
Route::get('add','validate\demoValidate@getAdd');
Route::post('add','validate\demoValidate@PostAdd');
Route::get('edit/{id}','validate\demoValidate@getUpdate');
Route::post('edit/{id}','validate\demoValidate@postUpdate');
Route::get('delete/{id}','validate\demoValidate@Delete');
Route::get('logout','validate\demoValidate@logout')->middleware('CheckAdmin');
