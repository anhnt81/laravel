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
            'level' => 1,
            'sotk' => 5000,
            'created_at' => new DateTime()
        ]);
    }
}
