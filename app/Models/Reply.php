<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Auth;

class Reply extends Model
{

  protected $table = "replies";

  protected $fillable = [
    'user_id', 'name', 'email', 'title', 'context'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
