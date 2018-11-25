<?php

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
        \App\Role::truncate();

        $role_admin = new \App\Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'middle administrator';
        $role_admin->save();

        $role_system_operator = new \App\Role();
        $role_system_operator->name = 'system operator';
        $role_system_operator->description = 'top administrator';
        $role_system_operator->save();
    }
}
