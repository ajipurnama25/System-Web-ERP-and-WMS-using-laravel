<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MWarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_warehouse')->insert(
            [
                [
                    'site' => '1',
                    'wh' => '1',
                    'wh_name' => 'FG-Anterum-wihout-PID',
                    'wh_alias' => 'Gudang FG-Frozen-Anterum tanpa PID',
                    'wh_kind' => '255',
                    'min_temp' => '15',
                    'max_temp' => '25',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                ['site' => '1','wh' => '2','wh_name' => 'FG-Anterum-with-PID','wh_alias' => 'Gudang FG-Frozen-Anterum dengan PID','wh_kind' => '255','min_temp' => '15','max_temp' => '25','status' => '1','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '1','wh' => '3','wh_name' => 'FG-Quarantine-without-PID','wh_alias' => 'Gudang FG-Frozen-Karantina tanpa PID','wh_kind' => '255','min_temp' => '-25','max_temp' => '-15','status' => '1','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '1','wh' => '4','wh_name' => 'FG-Quarantine-with-PID','wh_alias' => 'Gudang FG-Frozen-Karantina dengan PID','wh_kind' => '255','min_temp' => '-25','max_temp' => '-15','status' => '1','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '1','wh' => '5','wh_name' => 'FG-Frozen-Rack','wh_alias' => 'Gudang FG-Frozen-Rack Cold Storage','wh_kind' => '1','min_temp' => '-25','max_temp' => '-15','status' => '1','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '1','wh' => '6','wh_name' => 'FG-Frozen-Packs','wh_alias' => 'Gudang FG-Frozen-Packs (Pecah Karton)','wh_kind' => '3','min_temp' => '-25','max_temp' => '-15','status' => '1','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '1','wh' => '11','wh_name' => 'RM-Frozen-Anterum','wh_alias' => 'Gudang RM-Frozen-Anterum','wh_kind' => '255','min_temp' => '15','max_temp' => '25','status' => '1','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '1','wh' => '12','wh_name' => 'RM-Frozen','wh_alias' => 'Gudang RM-Frozen','wh_kind' => '2','min_temp' => '-25','max_temp' => '-15','status' => '1','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '1','wh' => '13','wh_name' => 'RM-Fresh','wh_alias' => 'Gudang RM-Fresh','wh_kind' => '2','min_temp' => '15','max_temp' => '25','status' => '1','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '1','wh' => '14','wh_name' => 'RM-Dry','wh_alias' => 'Gudang RM-Dry','wh_kind' => '2','min_temp' => '25','max_temp' => '35','status' => '1','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '1','wh' => '15','wh_name' => 'Packaging','wh_alias' => 'Gudang Packaging','wh_kind' => '255','min_temp' => '25','max_temp' => '35','status' => '1','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '1','wh' => '50','wh_name' => 'Production House','wh_alias' => 'Rumah Produksi','wh_kind' => '255','min_temp' => '25','max_temp' => '35','status' => '1','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '1','wh' => '101','wh_name' => 'On-Outbound-to-Receiving-Site','wh_alias' => 'On-Outbound-to-Receiving-Site','wh_kind' => '100','min_temp' => '0','max_temp' => '0','status' => '100','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '1','wh' => '180','wh_name' => 'On-Outbound-to-Customer','wh_alias' => 'On-Outbound-to-Customer','wh_kind' => '100','min_temp' => '0','max_temp' => '0','status' => '100','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '1','wh' => '190','wh_name' => 'Retur-to-Collect','wh_alias' => 'Retur-to-Collect','wh_kind' => '100','min_temp' => '0','max_temp' => '0','status' => '100','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '1','wh' => '202','wh_name' => 'Transit to Majalengka','wh_alias' => 'Titipan untuk Majalengka','wh_kind' => '255','min_temp' => '25','max_temp' => '35','status' => '200','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '2','wh' => '1','wh_name' => 'FG-Anterum-wihout-PID','wh_alias' => 'Gudang FG-Frozen-Anterum tanpa PID','wh_kind' => '255','min_temp' => '15','max_temp' => '25','status' => '1','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '2','wh' => '2','wh_name' => 'FG-Anterum-with-PID','wh_alias' => 'Gudang FG-Frozen-Anterum dengan PID','wh_kind' => '255','min_temp' => '15','max_temp' => '25','status' => '1','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '2','wh' => '3','wh_name' => 'FG-Quarantine-without-PID','wh_alias' => 'Gudang FG-Frozen-Karantina tanpa PID','wh_kind' => '255','min_temp' => '-25','max_temp' => '-15','status' => '1','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '2','wh' => '4','wh_name' => 'FG-Quarantine-with-PID','wh_alias' => 'Gudang FG-Frozen-Karantina dengan PID','wh_kind' => '255','min_temp' => '-25','max_temp' => '-15','status' => '1','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '2','wh' => '5','wh_name' => 'FG-Frozen-Rack','wh_alias' => 'Gudang FG-Frozen-Rack Cold Storage','wh_kind' => '1','min_temp' => '-25','max_temp' => '-15','status' => '1','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '2','wh' => '6','wh_name' => 'FG-Frozen-Packs','wh_alias' => 'Gudang FG-Frozen-Packs (Pecah Karton)','wh_kind' => '3','min_temp' => '-25','max_temp' => '-15','status' => '1','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '2','wh' => '11','wh_name' => 'RM-Frozen-Anterum','wh_alias' => 'Gudang RM-Frozen-Anterum','wh_kind' => '255','min_temp' => '15','max_temp' => '25','status' => '1','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '2','wh' => '12','wh_name' => 'RM-Frozen','wh_alias' => 'Gudang RM-Frozen','wh_kind' => '2','min_temp' => '-25','max_temp' => '-15','status' => '1','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '2','wh' => '13','wh_name' => 'RM-Fresh','wh_alias' => 'Gudang RM-Fresh','wh_kind' => '2','min_temp' => '15','max_temp' => '25','status' => '1','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '2','wh' => '14','wh_name' => 'RM-Dry','wh_alias' => 'Gudang RM-Dry','wh_kind' => '2','min_temp' => '25','max_temp' => '35','status' => '1','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '2','wh' => '15','wh_name' => 'Packaging','wh_alias' => 'Gudang Packaging','wh_kind' => '255','min_temp' => '25','max_temp' => '35','status' => '1','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '2','wh' => '21','wh_name' => 'Cooking Oil Tank','wh_alias' => 'Tangki Minyak Goreng','wh_kind' => '255','min_temp' => '25','max_temp' => '35','status' => '1','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '2','wh' => '50','wh_name' => 'Production House','wh_alias' => 'Rumah Produksi','wh_kind' => '255','min_temp' => '25','max_temp' => '35','status' => '1','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '2','wh' => '101','wh_name' => 'On-Outbound-to-Receiving-Site','wh_alias' => 'On-Outbound-to-Receiving-Site','wh_kind' => '100','min_temp' => '0','max_temp' => '0','status' => '100','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '2','wh' => '180','wh_name' => 'On-Outbound-to-Customer','wh_alias' => 'On-Outbound-to-Customer','wh_kind' => '100','min_temp' => '0','max_temp' => '0','status' => '100','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '2','wh' => '190','wh_name' => 'Retur-to-Collect','wh_alias' => 'Retur-to-Collect','wh_kind' => '100','min_temp' => '0','max_temp' => '0','status' => '100','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
                ['site' => '2','wh' => '201','wh_name' => 'Transit to Muara Baru','wh_alias' => 'Titipan untuk Muara Baru','wh_kind' => '255','min_temp' => '25','max_temp' => '35','status' => '200','created_at' => '2022-09-12 00:00:00','created_by' => '200613','updated_at' => '2022-09-12 00:00:00','updated_by' => '200613'],
            ]
        );
    }
}
