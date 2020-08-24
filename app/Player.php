<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
  protected $fillable = ['id', 'name', 'lastname', 'age', 'country', 'contract_expiry','team_id', 'agent_id'];

  public function team(){

    return $this->belongsTo('App\Team');
  }

  public function agent(){

    return $this->belongsTo('App\Agent');
  }

}
