<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelRole extends Model
{
  use HasFactory;
  // protected $guarded = [];
  protected $table = 'model_has_roles';

  public function user()
  {
    return $this->hasOne(User::class, 'model_id');
  }

  public function role()
  {
    return $this->belongsTo(Role::class, 'role_id');
  }
}
