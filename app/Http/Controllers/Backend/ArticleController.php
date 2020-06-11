<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Article;
use Validator;
use Hash;

class ArticleController extends Controller
{
  public function show()
  {
    return view('add_article');
  }

  protected $request;

  public function __construct(Request $request)
  {
    $this->request = $request;
  }

  public function store(Request $request)
  {

    if (Auth::check()) {
      $input = $request->all();
      // dd($input);
      $rules = ['title' => 'required', 'context' => 'required'];
      $validator = Validator::make($input, $rules);
      if ($validator->fails()) {
        return redirect()->route('add')
          ->withErrors($validator)
          ->withInput();
      } else {
        $user = Auth::user();
        $create = Article::create([
          'user_id' => $user->id,
          'title' => $request['title'],
          'content' => $request['context'],
        ]);
        return redirect()->route('login_home');
      }
    }
  }

  public function updated(Request $request)
  {
    if (Auth::check()) {
      $input = $request->all();
      // dd($input);
      $rules = ['title' => 'required', 'context' => 'required'];
      $validator = Validator::make($input, $rules);
      if ($validator->fails()) {
        return redirect()->route('add')
          ->withErrors($validator)
          ->withInput();
      } else {
        $user = Auth::user();
        Article::where('user_id', '=', $user->id)->update([
          'title' => $request['title'],
          'content' => $request['context'],
        ]);
        return redirect()->route('login_home');
      }
    }
  }
}
