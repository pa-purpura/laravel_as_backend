<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
  protected $fillable = ['id', 'name', 'lastname','country', 'address', 'phone'];

  public function player(){

    return $this->hasMany('App\Player');

  }

}
