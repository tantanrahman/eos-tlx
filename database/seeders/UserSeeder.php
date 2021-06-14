<?php

namespace Database\Seeders;

use App\Models\User;
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
        /**
         * 
         * User For Login in First Time Migration
         */

        User::create([
            'role_id'       => 1,
            'office_id'     => 1,
            'username'      => 'developer',
            'name'          => 'Developer',
            'email'         => 'tantanfaturrahman@tlx.co.id',
            'password'      => bcrypt('miracle000'),
        ]);
    }
}
