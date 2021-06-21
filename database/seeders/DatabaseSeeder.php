<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\CharacterEpisode;
use App\Models\Episode;
use App\Models\Quote;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Episode::factory()->count(10)
            ->has(Character::factory()->count(10))
            ->create();
        $characterEpisodes = CharacterEpisode::all();
        foreach ($characterEpisodes as $characterEpisode){
            Quote::factory()->count(10)->create([
                'episode_id' => $characterEpisode->episode_id,
                'character_id' => $characterEpisode->character_id,
            ]);
        }
    }
}
