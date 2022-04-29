<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//create role admin
		$role = new Role();
		$role->name = 'admin';
		$role->description = 'Administrador';
		$role->save();

		//create role user
		$role = new Role();
		$role->name = 'user';
		$role->description = 'User';
		$role->save();
	}
}
