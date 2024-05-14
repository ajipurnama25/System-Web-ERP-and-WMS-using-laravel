<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MRmCatTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_rm_cat_type')->insert(
            [
                [
                    'rm_cat_type' => '105',
                    'cat_name' => 'FG Seafood Local',
                    'wh_anterum_without_pid' => '1',
                    'wh_anterum_with_pid' => '2',
                    'wh_storage' => '5',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'rm_cat_type' => '106',
                    'cat_name' => 'FG Seafood Import',
                    'wh_anterum_without_pid' => '1',
                    'wh_anterum_with_pid' => '2',
                    'wh_storage' => '5',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'rm_cat_type' => '201',
                    'cat_name' => 'RM Dry',
                    'wh_anterum_without_pid' => '31',
                    'wh_anterum_with_pid' => '32',
                    'wh_storage' => '33',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'rm_cat_type' => '202',
                    'cat_name' => 'RM Fresh',
                    'wh_anterum_without_pid' => '21',
                    'wh_anterum_with_pid' => '22',
                    'wh_storage' => '23',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'rm_cat_type' => '203',
                    'cat_name' => 'RM Frozen',
                    'wh_anterum_without_pid' => '11',
                    'wh_anterum_with_pid' => '12',
                    'wh_storage' => '13',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'rm_cat_type' => '301',
                    'cat_name' => 'SM Carton',
                    'wh_anterum_without_pid' => '41',
                    'wh_anterum_with_pid' => '42',
                    'wh_storage' => '43',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'rm_cat_type' => '302',
                    'cat_name' => 'SM Label',
                    'wh_anterum_without_pid' => '41',
                    'wh_anterum_with_pid' => '42',
                    'wh_storage' => '43',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'rm_cat_type' => '303',
                    'cat_name' => 'SM Packaging',
                    'wh_anterum_without_pid' => '41',
                    'wh_anterum_with_pid' => '42',
                    'wh_storage' => '43',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'rm_cat_type' => '304',
                    'cat_name' => 'SM Plastic Bag',
                    'wh_anterum_without_pid' => '41',
                    'wh_anterum_with_pid' => '42',
                    'wh_storage' => '43',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'rm_cat_type' => '305',
                    'cat_name' => 'SM Tray Box',
                    'wh_anterum_without_pid' => '41',
                    'wh_anterum_with_pid' => '42',
                    'wh_storage' => '43',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'rm_cat_type' => '401',
                    'cat_name' => 'WIP General',
                    'wh_anterum_without_pid' => '50',
                    'wh_anterum_with_pid' => '50',
                    'wh_storage' => '50',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
            ]
        );
    }
}
