<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
  protected $fillable =
  [
    'user_id',
    'pair',
    'position',
    'entry',
    'target',
    'stop',
    'openDate',
    'closeDate',
    'notes',
    'units',
    'exit',
    'status',
    'realized'
  ];

  public function tradeDate()
  {
    return date('F jS H:i', strtotime($this->openDate));
  }
  public function images()
  {
    return $this->hasMany('App\Image');
  }
  public function position(){
      return ($this->entry > $this->target ? 'short' : 'long');
  }

  public function realized(){
    if(!$this->realized)
      return;
      
    return '$'.$this->realized;
  }

  public function position_arrows(){
      return ($this->entry > $this->target ? '<i class="fas fa-long-arrow-alt-down"></i>' : '<i class="fas fa-long-arrow-alt-up"></i>');
  }
}
