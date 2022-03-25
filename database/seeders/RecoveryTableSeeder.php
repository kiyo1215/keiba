<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecoveryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'year' => 2022,
            'date' => '2022-03',
            'bet' => 1000,
            'refund' => 1800
        ];
        DB::table('recoveries')->insert($param);
        $param = [
            'user_id' => 1,
            'year' => 2022,
            'date' => '2022-03',
            'bet' => 1000,
            'refund' => 1300
        ];
        DB::table('recoveries')->insert($param);
        $param = [
            'user_id' => 1,
            'year' => 2022,
            'date' => '2022-04',
            'bet' => 1000,
            'refund' => 1500
        ];
        DB::table('recoveries')->insert($param);
        $param = [
            'user_id' => 1,
            'year' => 2022,
            'date' => '2022-04',
            'bet' => 1000,
            'refund' => 1800
        ];
        DB::table('recoveries')->insert($param);
    }
}
