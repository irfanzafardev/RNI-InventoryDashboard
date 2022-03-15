<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  use HasFactory;
  // protected $guarded = [];
  protected $table = 'roles';

  public function ModelRole()
  {
    return $this->hasMany(ModelRole::class, 'role_id', 'id');
  }
}
