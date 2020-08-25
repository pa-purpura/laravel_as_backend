<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Player;

class TeamController extends Controller
{
  public function index(){

    return response()->json(Team::all());
  }

  public function team(Request $request, $id){

    if ($request->player) {
      return response()->json(Team::with('player')->find($id));
    }
    else{
      return response()->json(Team::find($id));
    }
  }

  public function create(Request $request){

    $data = $request->all();

    $new_team = new Team();

    $new_team->fill($data);

    $new_team->save();

    // return (una action da scegliere);
  }

}
