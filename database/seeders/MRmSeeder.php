<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MRmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_rm')->insert(
            [
                [
                    'sku' => '210008',
                    'rm_inv_type' => '1',
                    'rm_cat_type' => '201',
                    'rm_group' => '0001',
                    'sku_name' => 'RMD CORN STARCH LIHUA 25KG',
                    'uom2' => '',
                    'rate2' => '1',
                    'uom1' => 'ZAK',
                    'rate1' => '25000',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'sku' => '210009',
                    'rm_inv_type' => '1',
                    'rm_cat_type' => '201',
                    'rm_group' => '0001',
                    'sku_name' => 'RMD CORN STARCH XING MAO 25KG',
                    'uom2' => '',
                    'rate2' => '1',
                    'uom1' => 'ZAK',
                    'rate1' => '25000',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'sku' => '210019',
                    'rm_inv_type' => '1',
                    'rm_cat_type' => '201',
                    'rm_group' => '0002',
                    'sku_name' => 'RMD GARLIC POWDER FOODEX 20KG',
                    'uom2' => '',
                    'rate2' => '1',
                    'uom1' => 'ZAK',
                    'rate1' => '20000',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'sku' => '210020',
                    'rm_inv_type' => '1',
                    'rm_cat_type' => '201',
                    'rm_group' => '0002',
                    'sku_name' => 'RMD GARLIC POWDER KUPU2 1KG (10PAK/CTN)',
                    'uom2' => 'CTN',
                    'rate2' => '10',
                    'uom1' => 'PAK',
                    'rate1' => '1000',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'sku' => '210038',
                    'rm_inv_type' => '1',
                    'rm_cat_type' => '201',
                    'rm_group' => '0003',
                    'sku_name' => 'RMD MINYAK GORENG INDUSTRI LTR',
                    'uom2' => '',
                    'rate2' => '1',
                    'uom1' => 'LTR',
                    'rate1' => '914',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'sku' => '210039',
                    'rm_inv_type' => '1',
                    'rm_cat_type' => '201',
                    'rm_group' => '0003',
                    'sku_name' => 'RMD MINYAK GORENG MAJUAN 18L',
                    'uom2' => '',
                    'rate2' => '1',
                    'uom1' => 'BTL',
                    'rate1' => '16445',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'sku' => '210124',
                    'rm_inv_type' => '1',
                    'rm_cat_type' => '201',
                    'rm_group' => '0003',
                    'sku_name' => 'RMD MINYAK GORENG OLEIN KLASIK LTR',
                    'uom2' => '',
                    'rate2' => '1',
                    'uom1' => 'LTR',
                    'rate1' => '914',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'sku' => '210136',
                    'rm_inv_type' => '1',
                    'rm_cat_type' => '201',
                    'rm_group' => '0004',
                    'sku_name' => 'RMD BONCABE LV-30 (200GRX10PAK)',
                    'uom2' => 'CTN',
                    'rate2' => '10',
                    'uom1' => 'PAK',
                    'rate1' => '200',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'sku' => '210137',
                    'rm_inv_type' => '1',
                    'rm_cat_type' => '201',
                    'rm_group' => '0004',
                    'sku_name' => 'RMD CABEWON 1KG',
                    'uom2' => 'CTN',
                    'rate2' => '15',
                    'uom1' => 'PAK',
                    'rate1' => '1000',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
            ]
        );
    }
}
