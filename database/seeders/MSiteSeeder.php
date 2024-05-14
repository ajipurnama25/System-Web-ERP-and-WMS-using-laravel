<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_site')->insert(
            [
                [
                    'site' => '1',
                    'site_code' => 'MBR',
                    'site_name' => 'Muara Baru',
                    'line_count' => '2',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'site' => '2',
                    'site_code' => 'MJK',
                    'site_name' => 'Majalengka',
                    'line_count' => '16',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'site' => '3',
                    'site_code' => 'MDN',
                    'site_name' => 'Medan',
                    'line_count' => '1',
                    'status' => '0',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'site' => '4',
                    'site_code' => 'SMG',
                    'site_name' => 'Semarang',
                    'line_count' => '0',
                    'status' => '0',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
            ]
        );
    }
}
