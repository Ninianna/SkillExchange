<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Validator;
use Hash;

class loginController extends Controller
{
    public function show(){
        return view('login');
    }

    protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function login(Request $request){  

        $input = $request->all();
        // dd($input);
        $rules = ['email'=>'required', 'password'=>'required'];
        $validator = Validator::make($input,$rules);
        if($validator->fails()){
            return redirect()->route('login')
                    ->withErrors($validator)
                    ->withInput();
        }

        if(!Auth::attempt(['email' => $input['email'], 'password' => $input['password'] ])){

            return redirect()->route('register');
        }
        else{
            return redirect()->route('login_home');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function register(Request $request){

        $input = $request->all();
        $rules = ['name'=>'required', 'email'=>'required', 'password'=>'required', 'education'=>'required'];
        // dd($input);
        $validator = Validator::make($input, $rules);
        if($validator->fails()){
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput($input);
                             
        }
        else{
            
            $create = User::create([
                'name'=>$request['name'],
                'email'=>$request['email'],
                'password'=>bcrypt($request['password']),
                'education'=>$request['education'],
            ]);
            return redirect()->route('login');
        }

    }
}
