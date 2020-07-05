<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            'role_name' => 'Admin',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('roles')->insert([
            'role_name' => 'User',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Warek',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Konselor',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
