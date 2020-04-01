<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('tags')->insert([
            'name' => 'cinema',
            'type' => 'fav',
        ]);

        DB::table('tags')->insert([
            'name' => 'jazz',
            'type' => 'fav',
        ]);
        DB::table('tags')->insert([
            'name' => 'rock',
            'type' => 'fav',
        ]);
         DB::table('tags')->insert([
            'name' => 'calm',
            'type' => 'trait',
        ]);
         DB::table('tags')->insert([
            'name' => 'talkative',
            'type' => 'trait',
        ]);
         DB::table('tags')->insert([
            'name' => 'smoking',
            'type' => 'trait',
        ]);
        DB::table('tags')->insert([
            'name' => 'drinker',
            'type' => 'trait',
        ]);
    }
}
