<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;


class PlayerController extends Controller
{

  /*
   *  Return a players list
   */

  public function index(){

    return response()->json(Player::all());
  }

  /*
   *  Return a player detail
   */

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

  /*
   *  player to CREATE
   */

  public function create(Request $request){

    $data = $request->all();

    $new_player = new Player();

    $new_player->fill($data);

    try {
      $new_player->save();
    }
    catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'result' => $e->getMessage(),
      ]);
    }

    return response()->json([
        'success' => true,
        'result' => $new_player,
      ]);

  }

  /*
   *  player to DELETE
   */

  public function delete($id){

    $player_to_delete = Player::find($id);

    try {
      $player_to_delete->delete();
    }
    catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'result' => $e->getMessage(),
      ]);
    }

    return response()->json([
        'success' => true,
        'result' => $player_to_delete,
      ]);
  }

  /*
   *  player to UPDATE
   */
   
  public function edit(Request $request, $id){

    $player_to_update = Player::find($id);

    $player_to_update->fill($request->all());

    try {
      $player_to_update->save();
    }
    catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'result' => $e->getMessage(),
      ]);
    }

    return response()->json([
        'success' => true,
        'result' => $player_to_update,
      ]);

  }
// end class
}
