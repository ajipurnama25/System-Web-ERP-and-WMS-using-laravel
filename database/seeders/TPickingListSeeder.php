<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TPickingListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_picking_list')->insert(
            [
                [
                    'doc_ref' => 'TR300005',
                    'delv_date' => '2023-08-31',
                    'site' => '01',
                    'wh' => '14',
                    'seq' => '0',
                    'sku' => '210008',
                    'uom' => 'ZAK',
                    'rack_id' => 'RM1-01-B4',
                    'pallet' => '3424',
                    'qty' => '50',
                    'outbound_on' => '2023-08-25 10:05:12',
                    'outbound_by' => '5',
                    // 'inbound_on' => '',
                    // 'inbound_by' => '',
                    'flag' => '0'
                ],
                [
                    'doc_ref' => 'TR300005',
                    'delv_date' => '2023-08-31',
                    'site' => '01',
                    'wh' => '14',
                    'seq' => '0',
                    'sku' => '210008',
                    'uom' => 'ZAK',
                    'rack_id' => 'RM1-01-B5',
                    'pallet' => '6486',
                    'qty' => '50',
                    'outbound_on' => '2023-08-25 10:05:12',
                    'outbound_by' => '5',
                    // 'inbound_on' => '',
                    // 'inbound_by' => '',
                    'flag' => '0'
                ],
                [
                    'doc_ref' => 'TR300005',
                    'delv_date' => '2023-08-31',
                    'site' => '01',
                    'wh' => '14',
                    'seq' => '0',
                    'sku' => '210009',
                    'uom' => 'ZAK',
                    'rack_id' => 'RM1-01-B6',
                    'pallet' => '2876',
                    'qty' => '50',
                    'outbound_on' => '2023-08-25 10:05:12',
                    'outbound_by' => '5',
                    // 'inbound_on' => '',
                    // 'inbound_by' => '',
                    'flag' => '0'
                ],
                [
                    'doc_ref' => 'TR300005',
                    'delv_date' => '2023-08-31',
                    'site' => '01',
                    'wh' => '14',
                    'seq' => '0',
                    'sku' => '210009',
                    'uom' => 'ZAK',
                    'rack_id' => 'RM1-01-B7',
                    'pallet' => '3764',
                    'qty' => '50',
                    'outbound_on' => '2023-08-25 10:05:12',
                    'outbound_by' => '5',
                    // 'inbound_on' => '',
                    // 'inbound_by' => '',
                    'flag' => '0'
                ],
                [
                    'doc_ref' => 'TR300005',
                    'delv_date' => '2023-08-31',
                    'site' => '01',
                    'wh' => '14',
                    'seq' => '0',
                    'sku' => '210039',
                    'uom' => 'BTL',
                    'rack_id' => 'RM1-02-B5',
                    'pallet' => '7585',
                    'qty' => '30',
                    'outbound_on' => '2023-08-25 10:05:12',
                    'outbound_by' => '5',
                    // 'inbound_on' => '',
                    // 'inbound_by' => '',
                    'flag' => '0'
                ],
                [
                    'doc_ref' => 'TR300005',
                    'delv_date' => '2023-08-31',
                    'site' => '01',
                    'wh' => '14',
                    'seq' => '0',
                    'sku' => '210019',
                    'uom' => 'ZAK',
                    'rack_id' => 'RM1-02-B1',
                    'pallet' => '9869',
                    'qty' => '22',
                    'outbound_on' => '2023-08-25 10:05:12',
                    'outbound_by' => '5',
                    // 'inbound_on' => '',
                    // 'inbound_by' => '',
                    'flag' => '0'
                ],
            ]
        );
    }
}