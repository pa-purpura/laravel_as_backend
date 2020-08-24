<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('players', function (Blueprint $table) {

          $table->increments('id');
          $table->string('name', 50);
          $table->string('lastname', 50);

          $table->string('age', 50);
          $table->string('country', 50);
          $table->date('contract_expiry');

          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
