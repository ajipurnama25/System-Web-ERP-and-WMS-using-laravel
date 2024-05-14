<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MTerminalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_terminal')->insert(
            [
                [
                    'terminal' => 'TEST',
                    'site' => '1',
                    'wh' => '50',
                    'unit' => '2',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
            ]
        );
    }
}
