<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Auth;

class Match extends Model
{

  protected $table = "matches";

  protected $fillable = [
    'user_id', 'user_name', 'able_to_exchange', 'want_to_exchange', 'self_introduction', 'created_at', 'updated_at', 'match_user_id'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
