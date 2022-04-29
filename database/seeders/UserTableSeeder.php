<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //type user
        $role_admin = Role::where('name', 'admin')->first();
        $role_recluter = Role::where('name', 'recluter')->first();
        $role_developer = Role::where('name', 'developer')->first();

        //admin
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('romacode');
        $user->save();
        $user->roles()->attach($role_admin);

        //role_recluter
        $user = new User();
        $user->name = 'Recluter';
        $user->email = 'recluter@gmail.com';
        $user->password = bcrypt('romacode');
        $user->save();
        $user->roles()->attach($role_recluter);

        //role_developer
        $user = new User();
        $user->name = 'Developer';
        $user->email = 'developer@example.com';
        $user->password = bcrypt('romacode');
        $user->save();
        $user->roles()->attach($role_developer);
    }
}
