<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Categories')->insert([
            'categoryName' => 'Électroniques',
        ]);
        DB::table('Categories')->insert([
            'categoryName' => 'Accessoires de mode',
        ]);
        DB::table('Categories')->insert([
            'categoryName' => 'Véhicules - Motos',
        ]);
        DB::table('Categories')->insert([
            'categoryName' => 'Loisirs - Communauté',
        ]);
        DB::table('Categories')->insert([
            'categoryName' => 'Office space',
        ]);
        DB::table('Categories')->insert([
            'categoryName' => 'Emploi - Recrutement',
        ]);
        DB::table('Categories')->insert([
            'categoryName' => 'Électroménager- Maison',
        ]);
        DB::table('Categories')->insert([
            'categoryName' => 'Autres offres d\'emploi',
        ]);
        
    }
}
