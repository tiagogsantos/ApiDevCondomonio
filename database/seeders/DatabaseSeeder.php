<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        DB::table('units')->insert([
           'name' => 'Apartamento 01',
            'id_owner' => '1'
        ]);

        DB::table('units')->insert([
            'name' => 'Apartamento 02',
            'id_owner' => '1'
        ]);

        DB::table('units')->insert([
            'name' => 'Apartamento 03',
            'id_owner' => '0'
        ]);

        DB::table('areas')->insert([
            'allowed' => '1',
            'title' => 'Academia',
            'cover' => 'leg.jpg',
            'days' => '1,2,3',
            'start_time' => '06:00:00',
            'end_time' => '22:00:00'
        ]);

        DB::table('areas')->insert([
            'allowed' => '1',
            'title' => 'Churrasqueira',
            'cover' => 'barbecue.jpg',
            'days' => '4,5,6',
            'start_time' => '11:00:00',
            'end_time' => '18:00:00'
        ]);

        DB::table('areas')->insert([
            'allowed' => '1',
            'title' => 'Piscina',
            'cover' => 'piscina.jpg',
            'days' => '4,5,6',
            'start_time' => '08:00:00',
            'end_time' => '17:00:00'
        ]);
    }
}
