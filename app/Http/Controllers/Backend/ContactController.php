<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Storage;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Reply;
use Validator;
use Hash;

class ContactController extends Controller
{
  public function show()
  {
    return view('contact');
  }

  protected $request;

  public function __construct(Request $request)
  {
    $this->request = $request;
  }

  public function send(Request $request)
  {
    $input = $request->all();
    $rules = ['name' => 'required', 'email' => 'required', 'topic' => 'required', 'context' => 'required'];
    // dd($input);
    $validator = Validator::make($input, $rules);
    if ($validator->fails()) {
      return redirect()->back()
        ->withErrors($validator)
        ->withInput($input);
    } else {
      if (Auth::check()) {
        Reply::create([
          'user_id' => Auth::user()->id,
          'name' => $request['name'],
          'email' => $request['email'],
          'title' => $request['topic'],
          'context' => $request['context'],
        ]);
      } else {
        $create = Reply::create([
          'name' => $request['name'],
          'email' => $request['email'],
          'title' => $request['topic'],
          'context' => $request['context'],
        ]);
      }
      if (Auth::check()) {
        echo ("<script>alert('已成功送出！靜待客服中心回覆');location='login_home'</script>");
      } else {
        echo ("<script>alert('已成功送出！靜待客服中心回覆');location='/'</script>");
      }
    }
  }
}
