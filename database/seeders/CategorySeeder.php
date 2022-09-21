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
        DB::table('categories')->insert([
            'categoryName' => 'Électroniques',
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'Accessoires de mode',
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'Véhicules - Motos',
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'Loisirs - Communauté',
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'Office space',
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'Emploi - Recrutement',
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'Électroménager- Maison',
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'Autres offres d\'emploi',
        ]);
        
    }
}
