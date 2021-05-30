<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('courses');

        Storage::makeDirectory('courses');

        $this->truncateTables([
            'model_has_permissions',
            'model_has_roles',
            'role_has_permissions',
            'roles',
            'permissions',
            'images',
            'courses',
            'platforms',
            'prices',
            'categories',
            'levels',
            'users'
        ]);

        $this->call([
            UserSeeder::class,
            LevelSeeder::class,
            CategorySeeder::class,
            PriceSeeder::class,
            PlatformSeeder::class,
            CourseSeeder::class,
            RolesAndPermissionsSeeder::class
        ]);
    }

    protected function truncateTables(array $tables)
    {
        // Disable checking of foreing keys
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        // Activate checking of foreing keys
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
