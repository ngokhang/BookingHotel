<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Booking;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();
        User::create([
            'username' => fake()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => bcrypt('123456'),
            'role' => 'owner',
        ]);
        User::create([
            'username' => fake()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => bcrypt('123456'),
            'role' => 'owner',
        ]);
        UserInfo::factory(1)->create();
        Hotel::factory(12)->create();
        User::create([
            'username' => 'admin',
            'email' => fake()->unique()->safeEmail(),
            'password' => bcrypt('123456'),
            'role' => 'admin',
        ]);
        // Booking::factory(5)->create();
    }
}
