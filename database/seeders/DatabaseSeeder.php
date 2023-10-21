<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Booking;
use App\Models\UserInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(5)->create();
        UserInfo::factory(1)->create();
        Hotel::factory(12)->create();
        // Booking::factory(5)->create();
    }
}
