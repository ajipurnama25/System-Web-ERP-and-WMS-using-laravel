<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MSkuBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_sku_brand')->insert(
            [
                [
                    'sku_brand' => '1',
                    'brand_name' => 'Cedea',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'sku_brand' => '2',
                    'brand_name' => 'Teman Laut',
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
