<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agent;
use App\Player;

class AgentController extends Controller
{

  /*
   *  Return a agents list
   */

  public function index(){

    return response()->json(Agent::all());
  }

  /*
   *  Return a agent detail
   */

  public function agent(Request $request, $id){

    if ($request->player) {
      return response()->json(Agent::with('player')->find($id));
    }
    else{
      return response()->json(Agent::find($id));
    }
  }

  /*
   *  agent to CREATE
   */

  public function create(Request $request){

    $data = $request->all();

    $new_agent= new Agent();

    $new_agent->fill($data);

    try {
      $new_agent->save();
    }
    catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'result' => $e->getMessage(),
      ]);
    }

    return response()->json([
        'success' => true,
        'result' => $new_agent,
      ]);
  }

  /*
   *  agent to DELETE
   */

  public function delete($id){
    $agent_to_delete = Agent::find($id);

    try {
      $agent_to_delete->delete();
    }
    catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'result' => $e->getMessage(),
      ]);
    }

    return response()->json([
        'success' => true,
        'result' => $agent_to_delete,
      ]);
  }

  /*
   *  agent to UPDATE
   */

  public function edit(Request $request, $id){

    $agent_to_update = Agent::find($id);

    $agent_to_update->fill($request->all());

    try {
      $agent_to_update->save();
    }
    catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'result' => $e->getMessage(),
      ]);
    }

    return response()->json([
        'success' => true,
        'result' => $agent_to_update,
      ]);

  }
// end class
}
