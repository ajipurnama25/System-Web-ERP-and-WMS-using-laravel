<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            ModuleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
            //            MBomSeeder::class,
            //            MBomItemsSeeder::class,
            MDeptSeeder::class,
            //            MGradeSeeder::class,
            //            MRackCapacitySeeder::class,
            //            MRackDimSeeder::class,
            //            MRmCatTypeSeeder::class,
            //            MRmGroupSeeder::class,
            //            MRmInvTypeSeeder::class,
            //            MRmSeeder::class,
            //            MSiteSeeder::class,
            //            MSkuBrandSeeder::class,
            //            MSkuKindSeeder::class,
            //            MSkuCookTypeSeeder::class,
            //            MSkuRecipeSeeder::class,
            //            MSkuSeeder::class,
            //            MWarehouseSeeder::class,
            //            SRackSeeder::class,
        ]);
    }
}
