<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCharacterEpisodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('character_episode', function (Blueprint $table) {
            $table->foreign('character_id')->references('id')->on('characters')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('episode_id')->references('id')->on('episodes')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('character_episode', function (Blueprint $table) {
            $table->dropForeign('character_episode_character_id_foreign');
            $table->dropForeign('character_episode_episode_id_foreign');
        });
    }
}
