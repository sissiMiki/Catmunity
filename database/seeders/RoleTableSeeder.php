<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_catowner = Role::where('name', 'Catowner')->first();
        $role_catsitter = Role::where('name', 'Catsitter')->first();
        $role_admin = Role::where('name', 'Admin')->first();


    }
}
