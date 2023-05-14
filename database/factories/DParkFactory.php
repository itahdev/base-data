<?php

namespace Database\Factories;

use App\Constants\ParkDefinition;
use App\Enums\ParkStatus;
use App\Models\DPark;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends Factory<DPark>
 * @method DPark|DPark[] create($attributes = [], ?Model $parent = null)
 */
class DParkFactory extends Factory
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
            'status' => ParkStatus::OPEN,
            'terravie_park_flag' => 1,
            'name' => fake()->name,
            'image' => 'image/parks/' . ParkDefinition::TERRAVIE,
            'introduction' => fake()->text,
            'post_code' => '550-0013',
            'prefecture' => 27,
            'address' => fake()->address,
            'telephone' => fake()->phoneNumber,
            'email' => fake()->email,
            'contact_form' => fake()->url,
            'open_close' => '11:00〜19:00',
            'business_time_details' => 'https://shop.terravie.co.jp/pages/guide',
            'stay_time' => '02:00',
            'breeding_kind_qty' => 10,
            'breeding_qty' => 15,
            'url' => fake()->url,
            'facebook' => 'https://www.facebook.com/terravie/',
            'instagram' => 'https://www.instagram.com/terravie_aop/',
            'twitter' => 'https://twitter.com/Terravie1',
            'youtube' => 'https://www.youtube.com/channel/terravie',
            'tiktok' => 'https://www.tiktok.com/@terravie',
            'line' => 'https://page.line.me/terravie',
            'two_factor_auth_flag' => 0,
            'story_review_check_display_flag' => 1,
            'story_comment_available_flag' => 1,
            'mirairo_id' => 'mirairo111',
            'legal_register' => fake()->text,
            'latitude' => fake()->latitude,
            'longitude' => fake()->longitude,
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ];
    }
}
