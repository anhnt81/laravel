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
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => bcrypt('altplus'),
            'phone' => '01672078358',
            'level' => 1,
            'created_at' => new DateTime()
        ]);
    }
}
