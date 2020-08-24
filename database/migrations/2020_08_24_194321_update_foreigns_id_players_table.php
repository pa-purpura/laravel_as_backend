<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateForeignsIdPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('players', function (Blueprint $table) {

          $table->unsignedInteger('team_id')->nullable();
          $table->foreign('team_id')->references('id')->on('teams');

          $table->unsignedInteger('agent_id')->nullable();
          $table->foreign('agent_id')->references('id')->on('agents');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('players', function (Blueprint $table) {

          $table->dropColumn('agent_id');
          $table->dropColumn('team_id');


        });
    }
}
