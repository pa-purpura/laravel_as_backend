<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Player;

class TeamController extends Controller
{

  /*
   *  Return a agents list
   */

  public function index(){

    return response()->json(Team::all());
  }

  /*
   *  Return a team detail
   */

  public function team(Request $request, $id){

    if ($request->player) {
      return response()->json(Team::with('player')->find($id));
    }
    else{
      return response()->json(Team::find($id));
    }
  }

  /*
   *  team to CREATE
   */

  public function create(Request $request){

    $data = $request->all();

    $new_team = new Team();

    $new_team->fill($data);

    try {
      $new_team->save();
    }
    catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'result' => $e->getMessage(),
      ]);
    }

    return response()->json([
        'success' => true,
        'result' => $new_team,
      ]);
  }

  /*
   *  team to DELETE
   */

  public function delete($id){
    $team_to_delete = Team::find($id);

    try {
      $team_to_delete->delete();
    }
    catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'result' => $e->getMessage(),
      ]);
    }

    return response()->json([
        'success' => true,
        'result' => $team_to_delete,
      ]);
  }

  /*
   *  team to UPDATE
   */

  public function edit(Request $request, $id){

    $team_to_update = Team::find($id);

    $team_to_update->fill($request->all());

    try {
      $team_to_update->save();
    }
    catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'result' => $e->getMessage(),
      ]);
    }

    return response()->json([
        'success' => true,
        'result' => $team_to_update,
      ]);

  }
// end class
}
