<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User
		$user_role = new Role();
		$user_role->slug = 'user';
		$user_role->name = 'User';
		$user_role->save();
        //Admin
		$user_role = new Role();
		$user_role->slug = 'admin';
		$user_role->name = 'Admin';
		$user_role->save();
        //Super Admin
		$user_role = new Role();
		$user_role->slug = 'super_admin';
		$user_role->name = 'Super Admin';
		$user_role->save();
    }
}
