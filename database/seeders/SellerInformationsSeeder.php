<?php

namespace Database\Seeders;

use App\Models\SellerInformations;
use Illuminate\Database\Seeder;

class SellerInformationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SellerInformations::factory()
            ->count(3)
            ->create();
    }
}
