<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend.home');
    }

    public function  login() {
        if(!Auth::check()) {
            return view('backend.login');
        } else {

            $user = Auth::user();
            if($user->role_id == 1 ) {
                return redirect()->route('admin.dashboard');
            } else if($user->role_id == 2 || $user->role_id == 3) {
                return redirect('/');
           }
        }
    }

    public function postLogin(Request $request)
    {
        //validate du lieu
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6'
        ]);

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];


        // check success
        if (Auth::attempt($data, $request->has('remember'))) {
            $user = Auth::user();
            if($user->is_active == 0) {
                Auth::logout();
                return redirect()->back()->with('msg', 'Tài khoản của bạn chưa được kích hoạt');
            } else {
                if($user->role_id == 1 ) {
                    return redirect()->route('admin.dashboard');
                } else if($user->role_id == 2) {
                    return redirect('/');
                }
            }
        }
        return redirect()->back()->with('msg', 'Email hoặc Password không chính xác');
    }

    public function logout()
    {
        $user = Auth::user();
//        dd($user);
        Auth::logout();
        // chuyển về trang đăng nhập
        if($user->role_id == 1) {
            return redirect()->route('admin.login');
        }
        else if ($user->role_id == 2 || $user->role_id == 3) {
            return redirect('/');
        }
    }
}
