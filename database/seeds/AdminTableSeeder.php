<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = \App\Role::where('name', 'admin')->first();
        $role_system_operator  = \App\Role::where('name', 'system operator')->first();

        $admin = new \App\Admin();
        $admin->username = 'admin';
        $admin->name = 'Test Admin';
        $admin->email = 'admin@admin.com';
        $admin->lab_name = '정보시스템학과 연구실';
        $admin->univ = '한양대학교';
        $admin->dept = '정보시스템학과';
        $admin->password = bcrypt('secret');
        $admin->role = 'admin';
        $admin->save();
        $admin->roles()->attach($role_admin);

        $system_operator = new \App\Admin();
        $system_operator->username = 'system_operator';
        $system_operator->name = 'Lab_Manager';
        $system_operator->email = 'operator@operator.com';
        $system_operator->lab_name = '총괄';
        $system_operator->univ = '한양대학교';
        $system_operator->dept = '총괄';
        $system_operator->password = bcrypt('secret');
        $system_operator->role = 'system operator';
        $system_operator->save();
        $system_operator->roles()->attach($role_system_operator);
    }
}
