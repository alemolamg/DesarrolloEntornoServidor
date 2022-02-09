<?php

namespace Database\Seeders;

use App\Models\Fruit;
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
        /*
        DB::table('frutas')->insert([
            ['nombre_fruta' => 'naranja', 'temporada' => 1, 'pais' => 'España'],
            ['nombre_fruta' => 'pera', 'temporada' => 2, 'pais' => 'España'],
            ['nombre_fruta' => 'Fresa', 'temporada' => 1, 'pais' => 'Francia'],
        ]);

        $f = new Fruit();
        $f->nombre_fruta = 'manzana';
        $f->temporada = '1';
        $f->pais = "España";
        $f->save();


        $f = new Fruit();
        $f->nombre_fruta = 'naranja';
        $f->temporada = '2';
        $f->pais = "España";
        $f->save();

        $f = new Fruit();
        $f->nombre_fruta = 'fresa';
        $f->temporada = '1';
        $f->pais = "Francia";
        $f->save();

        $f = new Fruit();
        $f->nombre_fruta = 'pera';
        $f->temporada = '3';
        $f->pais = "España";
        $f->save();
        */

        Fruit::factory(10)->create();
    }
}
