<?php

namespace Database\Seeders;

use App\Models\AuditorRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuditorRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin' => 'Administrator of the platform', 'user' => 'Staff'];
        foreach ($roles as $key => $role){
            AuditorRole::updateOrCreate([
                'name' => $key,
                'description' => $role
            ], []);
        }
    }
}
