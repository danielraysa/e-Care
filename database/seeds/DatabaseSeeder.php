<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $adminId = App\User::insertGetId([
            'name' => 'Administrator',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);
        $userId = App\User::insertGetId([
            'name' => 'User One',
            'email' => 'user1@mail.com',
            'password' => Hash::make('password'),
            'role' => 'user'
        ]);
    }
}
