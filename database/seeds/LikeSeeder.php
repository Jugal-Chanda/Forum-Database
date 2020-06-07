<?php

use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Like::create(['user_id' => 3,'reply_id' => 2]);
      App\Like::create(['user_id' => 3,'reply_id' => 3]);
    }
}
