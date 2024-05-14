<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MSkuCookTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_sku_cook_type')->insert(
            [
                [
                    'sku_cook_type' => '0',
                    'cook_type_name' => 'Lain-lain / Others',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'sku_cook_type' => '1',
                    'cook_type_name' => 'Boiled / Rebus',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'sku_cook_type' => '2',
                    'cook_type_name' => 'Steamed / Kukus',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'sku_cook_type' => '3',
                    'cook_type_name' => 'Fried / Goreng',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'sku_cook_type' => '4',
                    'cook_type_name' => 'Baked / Panggang',
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
