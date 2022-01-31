<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
   
     protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = Auth::user();
        return [
            'posts_id' => Posts::factory(),
            'path' => 'imagesPost/'.$this->faker->image('public/storage/imagesPost/' ,640,480, null, false),
        ];
    }
}
