<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Location;
use App\Models\Categories;
use App\Models\Posts;
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
            LocationSeeder::class,
            SellerInformationsSeeder::class,
           ImageSeeder::class,

        ]);
       
    }
}
