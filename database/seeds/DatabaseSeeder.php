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
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
