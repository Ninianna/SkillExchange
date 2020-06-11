<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];

  protected $table = "articles";

  protected $fillable = [
    'user_id', 'title', 'content'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
