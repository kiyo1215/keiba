<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recovery;

class RecoveryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recovery::factory()->count(30)->create(); 
    }
}
