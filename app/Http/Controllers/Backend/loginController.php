<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function show(){
        return view('login');
    }

    public function login(){
        $input = Input::all();
        dd($input);
        $rules = ['email'=>'required','password'=>'required'];

        $validator = Validator::make($input,$rules);

        if($validator->passes()){
            $attempt = Auth::attempt(['email' => $input['email'], 'password' => $input['password']]);
            if($attempt){
                return view('login_home');
            }
            return Redirect::to('login')
                    ->withErrors(['fail'=>'帳號或密碼錯誤!']);
        }
        return Redirect::to('login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
    }

    public function logout(){

    }
}
