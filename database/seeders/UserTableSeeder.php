<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        {
            $user1 = new User;
            $user1->name = 'Catowner';
            $user1->email = 'user@catowner.com';
            $user1->roles()->attach($user1);
            $user1->password = bcrypt('catowner');
            $user1->save();

            $user2 = new User;
            $user2->name = 'Catsitter';
            $user2->email ='user@catsitter.com';
            $user2->password = bcrypt('catsitter');
            $user2->roles()->attach($user2);
            $user2->save();

            /*$admin = new User();
            $admin->first_name = 'Sissi';
            $admin->last_name = 'Admin';
            $admin->email = 'admin@example.com';
            $admin->password = bcrypt('admin');

            $admin->roles()->attach($role_admin);
             $admin->save();*/
        }


}
