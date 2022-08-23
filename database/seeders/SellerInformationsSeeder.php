<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SellerInformations;
use Illuminate\Support\Facades\DB;

class SellerInformationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seller_informations')->insert([
            'mobile_phone1' => 681328791,
            'gender' => 'Masculin',
            'district' => 'efoulan',
            'sellerEmail' => 'yvanjordannguetse@yahoo.fr',
            'about_yourself' => 'createur de NY-Annonces',
            'user_id' => 1,
            'location_id' => 1
        ]);
            
    }
}
