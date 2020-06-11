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
use App\Models\Match;
use Validator;
use Hash;
use Carbon\Carbon;

class CenterController extends Controller
{
  protected $request;

  public function __construct(Request $request)
  {
    $this->request = $request;
  }

  public function show()
  {
    if (Auth::check()) {
      $user_id = Auth::user()->id;
      $articles = Article::where('user_id', '=', $user_id)->get();
      if (Match::where('user_id', '=', $user_id)->where('match_user_id', '!=', null)->first() != null) {
        $match = Match::where('match_user_id', '=', $user_id)->first();
      } else {
        if (Match::where('user_id', '=', $user_id)->get()->isNotEmpty()) {
          $user_want = Match::where('user_id', '=', $user_id)->first()->want_to_exchange;
          $user_able = Match::where('user_id', '=', $user_id)->first()->able_to_exchange;
        } else {
          $user_able = '';
          $user_want = '';
        }
        $match = Match::where('user_id', '!=', $user_id)
          ->where('want_to_exchange', '=', $user_able)
          ->where('able_to_exchange', '=', $user_want)
          ->where('updated_at', '<=', Carbon::now('Asia/Taipei')->subDay()->toDateTimeString())
          ->where('match_user_id', '=', null)
          ->first();
        // dd($user_want);
        if ($match == null) {
          $match = Match::make([
            'user_id' => '',
            'want_to_exchange' => '',
            'able_to_exchange' => '',
            'self_introduction' => ''
          ]);
        } else {
          Match::where('user_id', '=', $user_id)->update([
            'match_user_id' => $match->user_id,
            'updated_at' => Carbon::now('Asia/Taipei')->subDay()->toDateTimeString()
          ]);
          Match::where('user_id', '=', $match->user_id)->update([
            'match_user_id' => $user_id,
            'updated_at' => Carbon::now('Asia/Taipei')->subDay()->toDateTimeString()
          ]);
        }
      }

      return view('center')
        ->with('articles', $articles)
        ->with('matches', $match);
    }
  }

  public function deleted(Request $request)
  {
    if (Auth::check()) {
      $input = $request->all();
      if ($request['delete'] == "刪除") {
        $article = Article::where('id', '=', $request['article_id']);
        $article->delete();
        // return view('center');
        echo ("<script>alert('刪除成功！');location='center'</script>");
      } else if ($request['delete'] == "編輯") {
        $article = Article::where('id', '=', $request['article_id'])->first();
        // dd($article);
        return view('revise_article')->with('articles', $article);
      } else {
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
          echo ("<script>alert('修改成功！');location='center'</script>");
        }
      }
    } else {
      return view('/login');
    }
  }
}
