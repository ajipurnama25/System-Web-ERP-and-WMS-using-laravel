<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SRackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($bay=1; $bay<9; $bay++) {
            for ($row=1; $row<27; $row++) {
                $tmp = 0;
                for ($tier=1; $tier<8; $tier++) {
                    $tmp++;
                    DB::table('s_rack')->insert(
                        [
                            [
                                'site' => '1',
                                'wh' => '5',
                                'bay' => $bay,
                                'row' => $row,
                                'tier' => $tmp,
                                'rack_id' => 'FG'.$bay.'-'.substr('00'.$row,-2).'-A'.$tier,
                                'capacity' => '0',
                                'available' => '0',
                                'pid' => '',
                                'pallet' => 0,
                                'sku' => '',
                                'exp_date' => NULL,
                                'pid_temp' => '',
                                'pallet_temp' => 0,
                            ],
                            [
                                'site' => '1',
                                'wh' => '5',
                                'bay' => $bay,
                                'row' => $row,
                                'tier' => ($tmp+1),
                                'rack_id' => 'FG'.$bay.'-'.substr('00'.$row,-2).'-B'.$tier,
                                'capacity' => '0',
                                'available' => '0',
                                'pid' => '',
                                'pallet' => 0,
                                'sku' => '',
                                'exp_date' => NULL,
                                'pid_temp' => '',
                                'pallet_temp' => 0,
                            ],
                        ]
                    );
                    $tmp++;
                }
            }
        }
    }
}
