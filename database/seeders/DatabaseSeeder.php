<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Location;
use App\Models\Categories;
use App\Models\Posts;
use App\Models\SellerInformations;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            userSeeder::class,
            LocationSeeder::class,
            SellerInformationsSeeder::class,
            CategorySeeder::class
        ]);
       
    }
}
