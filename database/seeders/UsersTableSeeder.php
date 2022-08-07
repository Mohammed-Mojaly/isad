<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'mohammed',
                'email' => 'fo4rtech@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$HzZ4UGQg0N/4zBMaoZkn8.YTCSpIGUQUEMp9HUI9OQH/1At4zVZH.',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => NULL,
                'type' => 'admin',
                'profile_photo_path' => NULL,
                'created_at' => '2022-08-04 05:33:43',
                'updated_at' => '2022-08-04 05:33:43',
            ),
        ));


    }
}
