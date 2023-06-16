<?php

namespace Database\Factories;

use App\Models\Auto;
use App\Models\Brand;
use App\Models\Client;
use App\Models\Country;
use App\Models\Salon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Auto>
 */
class AutoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Auto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'salon_id' => Salon::factory()->create()->id,
            'country_id' => Country::factory(),
            'brand_id' => Brand::factory(),
            'client_id' => Client::factory(),
            'series' => $this->faker->randomElement(['A', 'B', 'C']),
            'guaranty' => $this->faker->randomFloat(2, 1, 10),
            'price' => $this->faker->numberBetween(10000, 100000),
            'body_type' => $this->faker->randomElement(['Sedan', 'SUV', 'Hatchback']),
        ];
    }
}
