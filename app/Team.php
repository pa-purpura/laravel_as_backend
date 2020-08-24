<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
  protected $fillable = ['id', 'name', 'town', 'address', 'phone'];

  public function player(){

    return $this->hasMany('App\Player');
  }

}
