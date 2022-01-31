<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Posts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'details' => $this->faker->paragraph(10),
            'price' => random_int(1,100000),
            'user_id' => random_int(1,3),
            'category_id' => Categories::factory(),
            'type' =>  'Indivisual'
        ];
    }
}
