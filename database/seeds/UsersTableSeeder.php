<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin'),
            'role_id' => 1,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'User One',
            'email' => 'user1@mail.com',
            'password' => bcrypt('user1'),
            'role_id' => 2,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'User Two',
            'email' => 'user2@mail.com',
            'password' => bcrypt('user2'),
            'role_id' => 2,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
