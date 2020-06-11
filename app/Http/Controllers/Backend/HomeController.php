<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Storage;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Article;
use Validator;
use Hash;

class HomeController extends Controller
{
  public function show()
  {
    $articles = Article::orderBy('created_at', 'desc')->get();
    return view('index')
      ->with('articles', $articles);
  }

  protected $request;

  public function __construct(Request $request)
  {
    $this->request = $request;
  }

  public function login_home()
  {
    if (Auth::check()) {
      $articles = Article::orderBy('created_at', 'desc')->get();
      $user = User::where('id', '=', Auth::user()->id)->first();
      return view('login_home')
        ->with('articles', $articles)
        ->with('user', $user);
    } else {
      return redirect('login');
    }
  }
}
