<?php

namespace Database\Seeders;

use App\Models\Administrator;
use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administrator::updateOrCreate([
            'email' => 'admin@ea.com',
            'first_name' => 'Admin',
            'last_name' => 'T.',
            'is_verified' => 1,
            'phone' => '08134822658'
        ], ['password' => bcrypt('123456')]);
    }
}
