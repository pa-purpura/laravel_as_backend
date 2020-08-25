<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agent;
use App\Player;

class AgentController extends Controller
{
  public function index(){

    return response()->json(Agent::all());
  }

  public function agent(Request $request, $id){

    if ($request->player) {
      return response()->json(Agent::with('player')->find($id));
    }
    else{
      return response()->json(Agent::find($id));
    }
  }

  public function create(Request $request){

    $data = $request->all();

    $new_agent= new Agent();

    $new_agent->fill($data);

    $new_agent->save();

    // return (una action da scegliere);
  }

}
