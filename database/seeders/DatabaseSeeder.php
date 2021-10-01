<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Location;
use App\Models\Categories;
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
        Categories::factory(10)->create();
        Location::factory(10)->create();
       
    }
}
