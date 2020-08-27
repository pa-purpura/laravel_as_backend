<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeForeignidAttributeOnPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('players', function (Blueprint $table) {

          DB::statement('alter table players drop FOREIGN KEY players_team_id_foreign;');
          DB::statement('alter table players drop FOREIGN KEY players_agent_id_foreign;');

          DB::statement('alter table players add constraint players_team_id_foreign
                   foreign key (team_id)
                   references teams(id)
                   on delete cascade;'
                  );
          DB::statement('alter table players add constraint players_agent_id_foreign
                   foreign key (agent_id)
                   references agents(id)
                   on delete cascade;'
                  );
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

          DB::statement('alter table players drop FOREIGN KEY players_team_id_foreign;');
          DB::statement('alter table players drop FOREIGN KEY players_agent_id_foreign;');

          DB::statement('alter table players add constraint players_team_id_foreign
                   foreign key (team_id)
                   references teams(id);'
                  );
          DB::statement('alter table players add constraint players_agent_id_foreign
                   foreign key (agent_id)
                   references agents(id);'
                  );
        });
    }
}
