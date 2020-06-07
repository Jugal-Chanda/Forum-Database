<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $c1 = ['title' => 'Channel 1','slug' => Str::slug('Channel 1','-') ];
      $c2 = ['title' => 'Channel 2','slug' => Str::slug('Channel 2','-')];
      $c3 = ['title' => 'Channel 3','slug' => Str::slug('Channel 3','-')];
      $c4 = ['title' => 'Channel 4','slug' => Str::slug('Channel 4','-')];
      $c5 = ['title' => 'Channel 5','slug' => Str::slug('Channel 5','-')];
      App\Channel::create($c1);
      App\Channel::create($c2);
      App\Channel::create($c3);
      App\Channel::create($c4);
      App\Channel::create($c5);
    }
}
