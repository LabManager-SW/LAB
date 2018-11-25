<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Disable foreign key constraints before seeding.
         */
        if(config('database.default')!=='sqlite'){
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
        }
        /**
         * Truncate role table before seeding.
         */
        \App\Role::truncate();
        /**
         * Basic roles to be used for admins here.
         */
        $this->call(RoleTableSeeder::class);
        /**
         * Truncate admin table before seeding.
         */
        \App\Admin::truncate();
        /**
         * Testing account for admin and system operator.
         */
        $this->call(AdminTableSeeder::class);
        /**
         * Enaable foreign key constraints after seeding.
         */
        if(config('database.default')!=='sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }
}
