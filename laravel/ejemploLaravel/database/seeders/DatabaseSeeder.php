<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

//La he importado manualmente

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('frutas')->delete();
        DB::table('frutas')->insert([
            ['nombre_fruta' => 'naranja', 'temporada' => 1, 'pais' => 'España'],
            ['nombre_fruta' => 'pera', 'temporada' => 2, 'pais' => 'España'],
            ['nombre_fruta' => 'Fresa', 'temporada' => 1, 'pais' => 'Francia'],
        ]);
    }
}
