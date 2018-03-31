<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  protected $fillable = ['trade_id','path','title'];

  public function trade()
  {
      return $this->belongsToMany('App\Trade');
  }
}
