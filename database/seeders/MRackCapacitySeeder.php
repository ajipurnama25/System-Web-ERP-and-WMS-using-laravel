<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MRackCapacitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_rack_capacity')->insert(
            [
                [
                    'site' => '01',
                    'sku' => '110242',
                    'wh' => '5',
                    'max_cap' => '50',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'site' => '01',
                    'sku' => '110241',
                    'wh' => '5',
                    'max_cap' => '25',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'site' => '01',
                    'sku' => '110002',
                    'wh' => '5',
                    'max_cap' => '12',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'site' => '01',
                    'sku' => '110006',
                    'wh' => '5',
                    'max_cap' => '12',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'site' => '01',
                    'sku' => '110005',
                    'wh' => '5',
                    'max_cap' => '24',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'site' => '01',
                    'sku' => '110004',
                    'wh' => '5',
                    'max_cap' => '48',
                    'sku' => '110004',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'site' => '01',
                    'sku' => '110263',
                    'wh' => '5',
                    'max_cap' => '24',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'site' => '01',
                    'sku' => '110262',
                    'wh' => '5',
                    'max_cap' => '48',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
            ]
        );
    }
}
