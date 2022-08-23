<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Location;
use App\Models\SellerInformations;
use Illuminate\Database\Eloquent\Factories\Factory;

class SellerInformationsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SellerInformations::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mobile_phone1' => 681328791,
            'gender' => 'Masculin',
            'district' => $this->faker->word,
            'sellerEmail' => 'yvanjordannguetse@yahoo.fr',
            'about_yourself' => $this->faker->paragraph(2),
            'user_id' => 1,
            'location_id' => random_int(1,10)
        ];
    }
}
