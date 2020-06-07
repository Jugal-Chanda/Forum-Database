<?php

use Illuminate\Database\Seeder;

class ReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $r3 = [
        'user_id' => 2,
        'discussion_id' => 3,
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,'
      ];

      $r4 = [
        'user_id' => 1,
        'discussion_id' => 4,
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,'
      ];

      $r5 = [
        'user_id' => 4,
        'discussion_id' => 5,
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,'
      ];

      $r6 = [
        'user_id' => 2,
        'discussion_id' => 6,
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,'
      ];

      $r7 = [
        'user_id' => 5,
        'discussion_id' => 7,
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,'
      ];

      $r8 = [
        'user_id' => 3,
        'discussion_id' => 8,
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,'
      ];
      App\Reply::create($r4);
      App\Reply::create($r5);
      App\Reply::create($r6);
      App\Reply::create($r7);
      App\Reply::create($r8);
    }
}
