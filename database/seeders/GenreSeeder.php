<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::create(['name' => 'Hip-Hop',]);

        Genre::create(['name' => 'Pop',]);
        
        Genre::create(['name' => 'Rock',]);

        Genre::create(['name' => 'Jazz',]);
       
        Genre::create(['name' => 'Dance',]);
    }
}
