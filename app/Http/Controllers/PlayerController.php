<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;


class PlayerController extends Controller
{
  public function index(){

    return response()->json(Player::all());
  }

  // public function player($id){
  //
  //   return response()->json(Player::find($id));
  // }

  public function player(Request $request, $id){

    if ($request->team == true) {
      return response()->json(Team::with('agent')->find($id));
    }
    elseif ($request->agent == true) {
      return response()->json(Agent::with('agent')->find($id));
    }
    else{
      return response()->json(Player::find($id));
    }
  }

  public function create(Request $request){

    $data = $request->all();

    $new_player = new Player();

    $new_player->fill($data);

    $new_player->save();

    // return (una action da scegliere);
  }

}
