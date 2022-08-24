<?php

namespace Database\Seeders;

use App\Models\Pair;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PairsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pairs=[
            ['id'=>1,'currency_id_from'=>1,'currency_id_to'=>2,'rate'=>0.75],
            ['id'=>2,'currency_id_from'=>2,'currency_id_to'=>5,'rate'=>1.75],
            ['id'=>3,'currency_id_from'=>3,'currency_id_to'=>1,'rate'=>1.2],
            ['id'=>4,'currency_id_from'=>4,'currency_id_to'=>2,'rate'=>1.60],
        ];
        Pair::insert($pairs);


    }
}
