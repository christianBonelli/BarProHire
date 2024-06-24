<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['name' => 'mixology'],
            ['name' => 'catering'],
            ['name' => 'discoteche'],
            ['name' => 'flair'],
            ['name' => 'cocktailart'],
            ['name' => 'barlady'],
            ['name' => 'matrimoni'],
            ['name' => 'eventi'],
        ];

        // Inserisce i tag nella tabella 'tags'
        DB::table('tags')->insert($tags);
    }
}
