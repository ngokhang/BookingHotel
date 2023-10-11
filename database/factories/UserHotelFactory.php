<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserHotel>
 */
class UserHotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'user_id' => rand(1, 10),
            'hotel_id' => rand(1, 12),
            'check_in' => Carbon::now()->timestamp(),
            'check_out' => Carbon::now()->addDay(rand(1, 5))->timestamp(),
            'accepted' => rand(0, 1)
        ];
    }
}
