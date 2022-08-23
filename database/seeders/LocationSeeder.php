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
        DB::table('Locations')->insert([
            'locationName' => 'Yaoundé',
        ]);
        DB::table('Locations')->insert([
            'locationName' => 'Douala',
        ]);
        DB::table('Locations')->insert([
            'locationName' => 'Kribi',
        ]);
        DB::table('Locations')->insert([
            'locationName' => 'Bafoussam',
        ]);
        DB::table('Locations')->insert([
            'locationName' => 'Bertoua',
        ]);
        DB::table('Locations')->insert([
            'locationName' => 'Garoua',
        ]);
        DB::table('Locations')->insert([
            'locationName' => 'Limbé',
        ]);
        DB::table('Locations')->insert([
            'locationName' => 'Nkongsamba',
        ]);
    }
}
