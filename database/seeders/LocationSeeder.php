<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            'locationName' => 'Yaoundé',
        ]);
        DB::table('locations')->insert([
            'locationName' => 'Douala',
        ]);
        DB::table('locations')->insert([
            'locationName' => 'Kribi',
        ]);
        DB::table('locations')->insert([
            'locationName' => 'Bafoussam',
        ]);
        DB::table('locations')->insert([
            'locationName' => 'Bertoua',
        ]);
        DB::table('locations')->insert([
            'locationName' => 'Garoua',
        ]);
        DB::table('locations')->insert([
            'locationName' => 'Limbé',
        ]);
        DB::table('locations')->insert([
            'locationName' => 'Nkongsamba',
        ]);
    }
}
