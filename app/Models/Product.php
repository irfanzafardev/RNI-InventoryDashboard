<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;
  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function subcategory()
  {
    return $this->belongsTo(Subcategory::class);
  }

  public function unit()
  {
    return $this->belongsTo(Unit::class);
  }

  public function stockIn()
  {
    return $this->hasMany(StockIn::class);
  }

  public function stockOut()
  {
    return $this->hasMany(stockOut::class);
  }
}
