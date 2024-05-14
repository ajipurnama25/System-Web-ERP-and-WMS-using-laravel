<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MSkuKindSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_sku_kind')->insert(
            [
                [
                    'sku_kind' => '0',
                    'kind_name' => 'Lain-lain / Others',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
            ]
        );
    }
}
