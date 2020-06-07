<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\User::create([
        'name' => 'Admin',
        'email' => 'admin@admin.com',
        'password' => bcrypt('admin'),
        'admin' => 1
      ]);

      App\User::create([
        'name' => 'Jugal Kishore Chanda',
        'email' => 'jugal@gmail.com',
        'password' => bcrypt('123456')
      ]);

      App\User::create([
        'name' => 'Umme Hani Rimi',
        'email' => 'rimi78@gmail.com',
        'password' => bcrypt('123456')
      ]);


      App\User::create([
        'name' => 'Monir Hussain',
        'email' => 'monir@gmail.com',
        'password' => bcrypt('123456')
      ]);

      App\User::create([
        'name' => 'Monira Azad',
        'email' => 'moniraa@gmail.com',
        'password' => bcrypt('123456')
      ]);
    }
}
