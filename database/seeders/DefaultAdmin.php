<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
            'username' => 'admin',
            'email' => 'admin@jf.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            ]
            );
    }
}
