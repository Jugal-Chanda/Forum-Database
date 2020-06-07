<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DiscussionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $d1 = 'Channel 1 disscussion 1';
      $d2 = 'Channel 2 disscussion 1';
      $d3 = 'Channel 1 disscussion 2';
      $d4 = 'Channel 1 disscussion 3';
      $d5 = 'Channel 3 disscussion 1';
      $d6 = 'Channel 4 disscussion 1';
      $d7 = 'Channel 5 disscussion 1';
      $d8 = 'Channel 1 disscussion 4';
      $d9 = 'Channel 1 disscussion 5';
      $d10 = 'Channel 1 disscussion 6';

      App\Discussion::create([
        'title' => $d1,
        'user_id' => 1,
        'channel_id' => 1,
        'slug' => Str::slug($d1, '-'),
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
      ]);

      App\Discussion::create([
        'title' => $d2,
        'user_id' => 2,
        'channel_id' => 2,
        'slug' => Str::slug($d2, '-'),
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
      ]);

      App\Discussion::create([
        'title' => $d3,
        'user_id' => 2,
        'channel_id' => 1,
        'slug' => Str::slug($d3, '-'),
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
      ]);

      App\Discussion::create([
        'title' => $d4,
        'user_id' => 1,
        'channel_id' => 1,
        'slug' => Str::slug($d4, '-'),
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
      ]);

      App\Discussion::create([
        'title' => $d5,
        'user_id' => 2,
        'channel_id' => 3,
        'slug' => Str::slug($d5, '-'),
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
      ]);

      App\Discussion::create([
        'title' => $d6,
        'user_id' => 1,
        'channel_id' => 4,
        'slug' => Str::slug($d6, '-'),
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
      ]);

      App\Discussion::create([
        'title' => $d7,
        'user_id' => 1,
        'channel_id' => 5,
        'slug' => Str::slug($d7, '-'),
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
      ]);

      App\Discussion::create([
        'title' => $d8,
        'user_id' => 3,
        'channel_id' => 1,
        'slug' => Str::slug($d8, '-'),
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
      ]);

      App\Discussion::create([
        'title' => $d9,
        'user_id' => 2,
        'channel_id' => 1,
        'slug' => Str::slug($d9, '-'),
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
      ]);

      App\Discussion::create([
        'title' => $d10,
        'user_id' => 1,
        'channel_id' => 1,
        'slug' => Str::slug($d10, '-'),
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
      ]);



    }
}
