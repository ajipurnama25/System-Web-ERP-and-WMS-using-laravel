<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MSkuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_sku')->insert(
            [
                [
                    'sku' => '110242',
                    'sku_brand' => '1',
                    'sku_group' => '0',
                    'sku_cook_type' => '0',
                    'sku_name' => 'Chikuwa Long 240gr (20pak/ctn)',
                    'status' => '1',
                    'weight' => '240',
                    'bom' => '00000001',
                    'weight_input' => '1000',
                    'weight_output' => '990',
                    'ctn_pack' => '20',
                    'lifespan' => '547',
                    'barcode' => '0',
                    'md' => '0',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'sku' => '110241',
                    'sku_brand' => '1',
                    'sku_kind' => '0',
                    'sku_cook_type' => '0',
                    'sku_name' => 'Chikuwa Long 480gr (12pak/ctn)',
                    'status' => '1',
                    'weight' => '480',
                    'bom' => '00000001',
                    'weight_input' => '1000',
                    'weight_output' => '990',
                    'ctn_pack' => '12',
                    'lifespan' => '547',
                    'barcode' => '0',
                    'md' => '0',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'sku' => '110002',
                    'sku_brand' => '1',
                    'sku_kind' => '0',
                    'sku_cook_type' => '0',
                    'sku_name' => 'Chikuwa Long 1kg (12pak/ctn)',
                    'status' => '1',
                    'weight' => '1000',
                    'bom' => '00000001',
                    'weight_input' => '1000',
                    'weight_output' => '990',
                    'ctn_pack' => '12',
                    'lifespan' => '547',
                    'barcode' => '0',
                    'md' => '0',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'sku' => '110006',
                    'sku_brand' => '1',
                    'sku_kind' => '0',
                    'sku_cook_type' => '0',
                    'sku_name' => 'Chikuwa Mini 1kg (12pak/ctn)',
                    'status' => '1',
                    'weight' => '1000',
                    'bom' => '00000002',
                    'weight_input' => '1000',
                    'weight_output' => '990',
                    'ctn_pack' => '12',
                    'lifespan' => '547',
                    'barcode' => '0',
                    'md' => '0',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'sku' => '110005',
                    'sku_brand' => '1',
                    'sku_kind' => '0',
                    'sku_cook_type' => '0',
                    'sku_name' => 'Chikuwa Mini 500gr (12pak/ctn)',
                    'status' => '1',
                    'weight' => '500',
                    'bom' => '00000002',
                    'weight_input' => '1000',
                    'weight_output' => '990',
                    'ctn_pack' => '12',
                    'lifespan' => '547',
                    'barcode' => '0',
                    'md' => '0',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'sku' => '110004',
                    'sku_brand' => '1',
                    'sku_kind' => '0',
                    'sku_cook_type' => '0',
                    'sku_name' => 'Chikuwa Mini 250gr (20pak/ctn)',
                    'status' => '1',
                    'weight' => '250',
                    'bom' => '00000002',
                    'weight_input' => '1000',
                    'weight_output' => '990',
                    'ctn_pack' => '20',
                    'lifespan' => '547',
                    'barcode' => '0',
                    'md' => '0',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'sku' => '110263',
                    'sku_brand' => '1',
                    'sku_kind' => '0',
                    'sku_cook_type' => '0',
                    'sku_name' => 'Chikuwa Mushroom 500gr (12pak/ctn)',
                    'status' => '1',
                    'weight' => '500',
                    'bom' => '00000003',
                    'weight_input' => '1000',
                    'weight_output' => '950',
                    'ctn_pack' => '12',
                    'lifespan' => '547',
                    'barcode' => '0',
                    'md' => '0',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'sku' => '110262',
                    'sku_brand' => '1',
                    'sku_kind' => '0',
                    'sku_cook_type' => '0',
                    'sku_name' => 'Chikuwa Mushroom 250gr (20pak/ctn)',
                    'status' => '1',
                    'weight' => '250',
                    'bom' => '00000003',
                    'weight_input' => '1000',
                    'weight_output' => '950',
                    'ctn_pack' => '20',
                    'lifespan' => '547',
                    'barcode' => '0',
                    'md' => '0',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
            ]
        );
    }
}
