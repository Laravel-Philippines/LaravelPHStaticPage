<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  
  protected $dates = ['event_startdatetime', 'event_enddatetime'];
  
//  protected $fillable = ['event_startdatetime', 'event_enddatetime'];
  
  public function user()
  {
    echo $this->belongsTo('App\User','user_id'); 
  }

}
