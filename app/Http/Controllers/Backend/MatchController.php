<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Storage;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Match;
use Validator;
use Hash;
use Carbon\Carbon;

class MatchController extends Controller
{
  public function show()
  {
    $user_id = Auth::user()->id;
    if (Match::where('user_id', '=', $user_id)->get()->isNotEmpty()) {
      $match = Match::where('user_id', '=', $user_id)->first();
      return view('match')->with('matches', $match);
    } else {
      $match = Match::make([
        'want_to_exchange' => "",
        'able_to_exchange' => "",
        'self_introduction' => "",
      ]);
      return view('match')->with('matches', $match);
    }
  }

  protected $request;

  public function __construct(Request $request)
  {
    $this->request = $request;
  }

  public function store(Request $request)
  {
    $input = $request->all();
    $rules = ['want_to_exchange' => 'required', 'able_to_exchange' => 'required', 'self_introduction' => 'required'];
    // dd($input);
    $validator = Validator::make($input, $rules);
    if ($validator->fails()) {
      return redirect()->back()
        ->withErrors($validator)
        ->withInput($input);
    } else {
      $user_id = Auth::user()->id;
      if (Match::where('user_id', '=', $user_id)->get()->isNotEmpty()) {
        Match::where('user_id', '=', $user_id)->update([
          'want_to_exchange' => $request['want_to_exchange'],
          'able_to_exchange' => $request['able_to_exchange'],
          'self_introduction' => $request['self_introduction'],
          'updated_at' => Carbon::now('Asia/Taipei')->toDateTimeString(),
        ]);
        echo ("<script>alert('已經修改需求囉！隔天即可參與系統配對～');location='center'</script>");
      } else {
        $create = Match::create([
          'user_id' => Auth::user()->id,
          'user_name' => Auth::user()->name,
          'want_to_exchange' => $request['want_to_exchange'],
          'able_to_exchange' => $request['able_to_exchange'],
          'self_introduction' => $request['self_introduction'],
          'created_at' => Carbon::now('Asia/Taipei')->toDateTimeString(),
          'updated_at' => Carbon::now('Asia/Taipei')->subDay()->toDateTimeString(),
        ]);
        echo ("<script>alert('我們收到囉！正在幫您尋找合適的配對者～');location='center'</script>");
      }
    }
  }
}
