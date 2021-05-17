<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class userRegisterValidationController extends Controller
{
    //
    public function userRegisterValidation(Request $request){
        $user_name = $request->input('user_name');
        $password = $request->input('password');
        $password_confirm = $request->input('password_confirm');
        $admin = $request->input('admin');
        $email = $request->input('email');
        
        //入力値に対してのバリデーション
        //ユーザー名のみが半角英数字入力ではない場合
        if ($user_name == null && !preg_match("/^[a-zA-Z0-9]+$/", $user_name)) {
            $error_un = "ユーザー名は半角英数字で入力してください。";
            
            return view('user.userRegister', compact('error_un'));
        }
        //PWが8文字以上、半角英数字入力ではない場合
        if ($password == null && strlen($password) < 8 || !preg_match("/^[a-zA-Z0-9]+$/", $password)){
            $error_pw = "パスワードは半角英数字・8文字以上で入力してください。";
            
            return view('user.userRegister', compact('error_pw'));
        }
        if ($password != $password_confirm) {
            $error_pw = "パスワードとパスワード（確認）は一致する必要があります。";
            
            return view('user.userRegister', compact('error_pw'));
        }
        // PWが8文字以上ではない場合
        if (strlen($password) < 8) {
            $error_pw = "パスワードは8文字以上で入力してください。";
            
            return view('user.userRegister', compact('error_pw'));
        }
        //Eメールが半角英数字入力ではない場合
        if ($email == null || !preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
            $error_em = "Eメールアドレスを正しく入力してください。";
            
            return view('user.userRegister', compact('error_em'));
        }
        return view('user.userRegisterConfirm', compact('user_name', 'password', 'admin', 'password_confirm', 'email'));
    }
}
