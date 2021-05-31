<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::factory()->create([
            'name' => 'Luis Antonio Parrado',
            'email' => 'luisprmat@gmail.com'
        ]);

        $admin->assignRole('admin');

        User::factory()->count(99)->create();
    }
}
