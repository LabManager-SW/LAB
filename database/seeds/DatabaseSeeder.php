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
        $this->call(UserTableSeeder::class);
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
        $this->call(Experiment_DetailsTableSeeder::class);

        $this->call(ParticipantsTableSeeder::class);
        /**
        \App\Admin::truncate();
        /**
         * Testing account for admin and system operator.
         */
        \App\Admin::truncate();
        $this->call(AdminTableSeeder::class);
        /**
         * Enaable foreign key constraints after seeding.
         */
        if(config('database.default')!=='sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }
}
