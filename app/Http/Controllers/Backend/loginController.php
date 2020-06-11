<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Validator;
use Hash;

class loginController extends Controller
{
    public function show()
    {
        return view('login');
    }

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function login(Request $request)
    {
        $input = $request->all();
        // dd($input);
        $rules = ['email' => 'required', 'password' => 'required'];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput();
        }
        if (!Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('register');
        } else {
            return redirect('login_home');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function register(Request $request)
    {

        $input = $request->all();
        $rules = ['name' => 'required', 'email' => 'required', 'password' => 'required', 'edu' => 'required'];
        // dd($input);
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($input);
        } else {
            $create = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
                'education' => $request['edu'],
            ]);
            // return redirect()->route('login');
            echo ("<script>alert('申請成功！請重新登入！');location='login'</script>");
        }
    }
}
