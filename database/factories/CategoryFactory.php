<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'parent_id' => $this->faker->randomDigitNotNull(),
            'name' => $this->faker->word(),
            'slug' => $this->faker->slug(2),
            'image' =>$this->faker->imageUrl(640, 480, 'animals', true),
            'created_at' => now(),
        ];
    }
}
