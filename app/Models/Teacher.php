<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Teacher extends Model
{

  protected $table = "teachers";

  protected $fillable = [
    'user_id', 'highest_education', 'departments', 'teaching_experience', 'path'
  ];
  public function user()
  {
    return $this->belongsTo('User');
  }
}
