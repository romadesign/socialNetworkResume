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

		//create role developer
		$role = new Role();
		$role->name = 'developer';
		$role->description = 'Developer';
		$role->save();

		//create role recluter
		$role = new Role();
		$role->name = 'recluter';
		$role->description = 'Recluter';
		$role->save();
	}
}
