<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Posts;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Nguetse',
            'last_name' => 'yvan',
            'status' => 'Admin',
            'status_connection' => 'access',
            'email' => 'yvanjordannguetse@yahoo.fr',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);
    }
}
