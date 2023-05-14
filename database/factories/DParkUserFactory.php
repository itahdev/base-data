<?php

namespace Database\Factories;

use App\Enums\ParkUserStatus;
use App\Enums\ParkAdminAuthorityFlag;
use App\Models\DParkUser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DParkUser>
 */
class DParkUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->unique()->uuid(),
            'status' => ParkUserStatus::ACTIVE->value,
            'password' => bcrypt('password'),
            'park_id' => fake()->unique()->uuid(),
            'name' => fake()->name,
            'image' => fake()->image,
            'display_name' => fake()->name,
            'email' => fake()->unique()->safeEmail(),
            'admin_authority_flag' => ParkAdminAuthorityFlag::ADMIN->value,
            'memo' => fake()->text,
            'introduction' => fake()->text
        ];
    }
}
