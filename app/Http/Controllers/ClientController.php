<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Cac function lien quan den account, chua test, chua active
    public function getRegisterAccount()
    {
        return view('');
    }

    public function postRegisterAccount(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);
        // client lúc mới đăng ký chỉ cần email, mật khẩu
        //luu vào csdl
        $user = new User();
        $user->name = $request->input('name'); // họ tên
        $user->birthday = ' '; // ngày sinh
        $user->phone = ' '; //
        $user->cmnd = ' ';
        $user->email = $request->input('email'); // email
        $user->password = bcrypt($request->input('password')); // mật khẩu
        $user->role_id = 3; // phần quyền
        $user->address = ' ';
        if ($request->hasFile('avatar')) {
            // get file
            $file = $request->file('avatar');
            // get ten
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/user/';
            // upload file
            $request->file('avatar')->move($path_upload,$filename);

            $user->image = $path_upload.$filename;
        }

        $user->is_active = 1;
        $user->save();
    }

    public function showInfoAccount($id)
    {
        $user = User::findorFail($id);
        return view('', [
            'user' => $user
        ]);
    }

    public function editAccount($id)
    {
        $user = User::findorFail($id);


        return view('', [
            'user' => $user
        ]);
    }

    public function updateAccount(Request $request, $id)
    {
        //validate
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);

        $user = User::findorFail($id);
        //luu vào csdl
        $user->name = $request->input('name'); // họ tên
        $user->birthday = $request->input('birthday');
        $user->phone = $request->input('phone');
        $user->cmnd = $request->input('cmnd');
        $user->address = $request->input('address');
        if ($request->input('new_password')) {
            $user->password = bcrypt($request->input('new_password')); // mật khẩu mới
        }

        if ($request->hasFile('new_avatar')) {
            // xóa file cũ
            @unlink(public_path($user->avatar)); // hàm unlink của PHP không phải laravel , chúng ta thêm @ đằng trước tránh bị lỗi
            // get file
            $file = $request->file('new_avatar');
            // get ten
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/user/';
            // upload file
            $request->file('new_avatar')->move($path_upload,$filename);

            $user->image = $path_upload.$filename;
        }

        $user->save();

        // chuyen dieu huong trang
        return redirect()->route('', ['id' => $user->id])->with('msg', 'Cập nhật tài khoản thành công.'); // return viw showAccount
    }

    // het function ve account


}
