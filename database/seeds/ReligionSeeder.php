<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Islam',
            ],
            [
                'name' => 'Kristen',
            ],
            [
                'name' => 'Buddha',
            ],
            [
                'name' => 'Hindu',
            ],
            [
                'name' => 'Konghucu',
            ],
        ];

        DB::table('religions')->insert($data);
    }
}
