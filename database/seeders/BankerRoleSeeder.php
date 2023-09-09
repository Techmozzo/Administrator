<?php

namespace Database\Seeders;

use App\Models\BankerRole;
use Illuminate\Database\Seeder;

class BankerRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin' => 'Administrator of the platform', 'user' => 'Bank staff'];
        foreach ($roles as $key => $role){
            BankerRole::updateOrCreate([
                'name' => $key,
                'description' => $role
            ], []);
        }
    }
}
