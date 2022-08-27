<?php

namespace Database\Seeders;

use App\Models\Convert;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConvertTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $converts=[
            ['id'=>1,'pair_id'=>1,'number_pair'=>2],
            ['id'=>2,'pair_id'=>2,'number_pair'=>5],
        ];
        Convert::insert($converts);
    }
}
