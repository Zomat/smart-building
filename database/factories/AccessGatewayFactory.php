<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Room;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AccessGateway>
 */
class AccessGatewayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rooms = Room::all();
        return [
            'name' => 'Access Gateway '.$this->faker->unique()->numberBetween(1, 100),
            'number' => $this->faker->randomLetter().$this->faker->unique()->numberBetween(1, 100),
            'room_id' => $rooms->random()->id,
        ];
    }
}
