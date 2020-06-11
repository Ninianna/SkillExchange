<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ResetYourPasswords;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Hash;

class WarningController extends Controller
{

    public function show()
    {
        return view('forget');
    }

    public function send(Request $request)
    {
        $email = $request['email'];
        $user  = User::where('email', '=', $email)->first();
        $token = 'random token';
        $user->token = $token;
        $user->save();
        $params = [
            'say' => '敬愛的 ' . $user->name . ' 您好,' . '請點擊右側網址修改密碼：' .
                route('get-reset-pwd-page', $token)
        ];
        Mail::to($user->email)->send(new ResetYourPasswords($params));
        echo ("<script>alert('已寄送修改密碼至使用者信箱！請查看電子信箱！');location='/'</script>");
    }




    public function ABC($token)
    {
        return view('ResetYourPasswords')->with('token', $token);
    }

    public function BCD(Request $request)
    {
        $user = User::where('token', '=', $request['reset_pwd_token'])->first();
        $user->password = bcrypt($request['password']);
        $user->save();
        echo ("<script>alert('密碼修改成功！請重新登入！');location='login'</script>");
    }
}
