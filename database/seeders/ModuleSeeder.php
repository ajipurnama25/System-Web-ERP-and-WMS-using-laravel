<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert(
            [
                [
                    'name' => 'users',
                    'description' => 'module users',
                ],
                [
                    'name' => 'roles',
                    'description' => 'module roles',
                ],
                [
                    'name' => 'permissions',
                    'description' => 'module permissions',
                ],
                [
                    'name' => 'articles',
                    'description' => 'module articles',
                ],
            ]
        );
    }
}
