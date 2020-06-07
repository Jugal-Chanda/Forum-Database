<?php

use Illuminate\Database\Seeder;

class WatcherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Watcher::create([
        'user_id' => 3,
        'discussion_id' => 8
      ]);

      App\Watcher::create([
        'user_id' => 4,
        'discussion_id' => 8
      ]);

      App\Watcher::create([
        'user_id' => 5,
        'discussion_id' => 8
      ]);
    }
}
