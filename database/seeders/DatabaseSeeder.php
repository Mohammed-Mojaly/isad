<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(CountriesTableSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UsersTableSeeder::class);
        // \App\Models\User::factory(100)->create();
        // \App\Models\Beneficiary::factory(50)->create();
        // \App\Models\HouseInfo::factory(50)->create();
    }
}
