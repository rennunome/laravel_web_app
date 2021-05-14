<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userValidationController extends Controller
{
    public function userValidation(Request $request){
        //前画面formから取得の値
        $user_id = $request->input('user_id');
        $user_name = $request->input('user_name');
        $pw = $request->input('pw');
        $password_confirm = $request->input('password_confirm');
        $admin = $request->input('admin');
        //adminはString
        if($admin == "on"){
            $admin == 1;
        } else {
            $admin == 0;
        }
        
        //DBから取得の値
        $user = DB::table('users')->where('id', $user_id)->get();
       
        $error_un = "";
        $error_pw= "";

        // ユーザー名のみが半角英数字入力ではない場合
        if ($user_name == null && ! preg_match("/^[a-zA-Z0-9]+$/", $user_name)) {
            $error_un = "ユーザー名は半角英数字で入力してください。";
            return view('user.userEdit', compact('error_un', 'user_id', 'user_name', 'pw', 'admin'));
        }
        // PWが8文字以上、半角英数字入力ではない場合
        if ($pw == null && strlen($pw) < 8 || ! preg_match("/^[a-zA-Z0-9]+$/", $pw)) {
            $error_pw = "パスワードは半角英数字・8文字以上で入力してください。";

            return view('user.userEdit', compact('error_pw',  'user_id', 'user_name', 'pw', 'admin'));
        }
        
        // PWが8文字以上ではない場合
        if (strlen($pw) < 8) {
            $error_pw = "パスワードは8文字以上で入力してください。";
            
            return view('user.userEdit', compact('error_pw',  'user_id', 'user_name', 'pw', 'admin'));
        }
        
        //PWとPW確認が一致しない場合
        if ($pw != $password_confirm) {
            $error_pw = "パスワードとパスワード（確認）は一致する必要があります。";

            return view('user.userEdit', compact('error_pw',  'user_id', 'user_name', 'pw', 'admin'));
        }
       
        return view('user.userEditConfirm', compact( 'user_id', 'user_name', 'pw', 'admin'));
    }
}
