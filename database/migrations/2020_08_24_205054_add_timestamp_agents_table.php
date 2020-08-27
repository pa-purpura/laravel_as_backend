<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     /* I'd forgotten the 'timestamp' columns om first migration (create_agent_table), and so i do this migrations
        to add it. */

    public function up()
    {
        Schema::table('agents', function (Blueprint $table) {
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
        Schema::table('agents', function (Blueprint $table) {
          $table->dropColumn('created_at');
          $table->dropColumn('update_at');
        });
    }
}
