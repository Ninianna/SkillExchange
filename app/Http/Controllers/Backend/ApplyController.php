<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Storage;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Teacher;
use Validator;
use Hash;

class ApplyController extends Controller
{
  public function show()
  {
    return view('apply');
  }

  protected $request;

  public function __construct(Request $request)
  {
    $this->request = $request;
  }

  public function apply(Request $request)
  {

    $input = $request->all();
    $rules = [
      'highestEducation' => 'required',
      'department' => 'required',
      'experience' => 'required',
      'file' => 'required'
    ];
    // dd($request->file('file'));
    $validator = Validator::make($input, $rules);
    if ($validator->fails()) {
      return redirect()->back()
        ->withErrors($validator)
        ->withInput($input);
    } else {
      $file_path = $request->file('file')->store('public');
      $user = Auth::user();
      $create = Teacher::create([
        'user_id' => $user->id,
        'highest_education' => $request['highestEducation'],
        'departments' => $request['department'],
        'teaching_experience' => $request['experience'],
        'path' => $file_path
      ]);
      // return redirect()->route('login_home');
      echo ("<script>alert('已送出申請！');location='login_home'</script>");
    }
  }
}
