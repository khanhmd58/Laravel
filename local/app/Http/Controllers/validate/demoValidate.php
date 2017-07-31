<?php

namespace App\Http\Controllers\validate;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
class demoValidate extends Controller
{
    public function getForm(){
    	return view('demoValidate.demoValidateForm');
    }

    public function validateForm(Request $request){
    	$rules = ['user' => 'required|min:6|max:18',
    			  'pass' => 'required|min:6|max:12'
    			 ];

    	$messages = [ 'user.required' => 'Tài khoản không Được Để trống',
                    'user.min' => 'Tài khoản phải lớn hơn 6 kí tự',
                    'user.max' => 'Tài khoản phải nhỏ hơn 18 kí tự',
                    'pass.required' => 'Mật khẩu không Được Để Trống',
                    'pass.min' => 'Mật khẩu phải lớn hơn 6',
    				        'pass.max' => 'Mật khẩu phải nhỏ hơn 12',
    				];

    	$input = $request->all();
    	$validator = Validator::make($input, $rules, $messages);
    	if ($validator->fails()) {
    		$errors = $validator->errors();
    		return view('demoValidate.demoValidateForm',compact('errors'));

    	} else {
            $users_count = DB::table('thanhvien')->where([
                ['username', '=', $request->user],
                ['password', '=', $request->pass],
            ])->count();

            if($users_count>0){
                Session::put('user',$request->user);
                Session::put('pass',$request->pass);
                Session::flash('success','Đăng Nhập Thành Công');
                return redirect()->route('getList');

            } else{
                $errors_login = "Tài khoản đăng nhập không tồn tại";
                Session::flash('error',$errors_login);
                return redirect()->back();
            }
        }
    }

    public function admin(){
        $users = DB::table('thanhvien')->orderBy('id', 'desc')->paginate(2);
        return view('demoValidate.admin',compact('users'));
    }

    public function getAdd(){
        return view('demoValidate.add');
    }

    public function PostAdd(Request $request ){
        $rules = ['user' => 'required|min:6|max:18',
                  'pass' => 'required|min:6|max:12',
                  'fullname' => 'required',
                  'email' => 'required|email'
                 ];

        $messages = [ 'user.required' => 'Tài khoản không Được Để trống',
                      'user.min' => 'Tài khoản phải lớn hơn 6 kí tự',
                      'user.max' => 'Tài khoản phải nhỏ hơn 18 kí tự ',
                      'pass.required' => 'Mật khẩu không Được Để Trống',
                      'pass.min' => 'Mật khẩu phải lớn hơn 6',
                      'pass.max' => 'Mật khẩu phải nhỏ hơn 12',
                      'fullname.required' => 'Tên Không Được Để Trống',
                      'email.required' => 'Email Không Được Để Trống',
                      'email.email' => 'Phải là định dạng email'
                    ];

        $input = $request->all();
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return view('demoValidate.add',compact('errors'));

        } else{
            DB::table('thanhvien')->insert(
                [
                    'username' => $request->user,
                    'password' => $request->pass,
                    'fullname' => $request->fullname,
                    'email' => $request->email
                ]
            );
            Session::flash('notice_add', 'Thêm Mới Thành Công');
            return redirect()->route('getList');
        }
    }

    public function getUpdate($id){
        $users_edit= DB::table('thanhvien')->where([
                ['id', '=',$id],
            ])->get();
        //dd($users_edit[0]);
        return view('demoValidate.edit',compact('users_edit'));
    }

    public function postUpdate(Request $request, $id ){
       $rules = ['user' => 'required|min:6|max:12',
                  'pass' => 'required|min:6|max:12',
                  'fullname' => 'required',
                  'email' => 'required|email'
                 ];

        $messages = [ 'user.required' => 'Tài khoản không Được Để trống',
                      'user.min' => 'Tài khoản phải lớn hơn 6 kí tự',
                      'user.max' => 'Tài khoản phải nhỏ hơn 18 kí tự ',
                      'pass.required' => 'Mật khẩu không Được Để Trống',
                      'pass.min' => 'Mật khẩu phải lớn hơn 6',
                      'pass.max' => 'Mật khẩu phải nhỏ hơn 12',
                      'fullname.required' => 'Tên Không Được Để Trống',
                      'email.required' => 'Email Không Được Để Trống',
                      'email.email' => 'Phải là định dạng email'
                    ];

        $input = $request->all();
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $users_edit= DB::table('thanhvien')->where([
                ['id', '=',$id],
            ])->get();
        //dd($users_edit[0]);
            return view('demoValidate.edit',compact('errors','users_edit'));
        } else{
            DB::table('thanhvien')
            ->where('id', $id)
            ->update([
                    'username' => $request->user,
                    'password' => $request->pass,
                    'fullname' => $request->fullname,
                    'email' => $request->email
                ]);
            Session::flash('notice_edit', 'Sửa Thành Công');
            return redirect()->route('getList');
        }
    }

    public function Delete($id){
          DB::table('thanhvien')->where('id', '=', $id)->delete();
          Session::flash('notice_delete','Xóa Thành Công');
          return redirect()->route('getList');
    }
    public function logout(){
      Session::flush();
      return redirect('login');
    }
}
