<?php

use Illuminate\Database\Seeder;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $bodys = ['勉強する','遊ぶ','寝る'];
        foreach ($bodys as $body) {
          DB::table('todos')->insert([
            'body' => $body,
            'created_at' => new Datetime(),
            'updated_at' => new Datetime()
          ]);
        }
    }
}
