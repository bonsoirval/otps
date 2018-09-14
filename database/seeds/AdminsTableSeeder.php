<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     /*$table->increments('id');
     $table->string('name', 191);
     $table->string('email', 191);
     $table->string('job_title', 191);
     $table->string('password', 191);*/

    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'ADMIN NJOKU OKECHUKWU VALENTINE',
            'email' => 'admin@gmail.com',
            'job_title' => 'Web Administrator',
            'password' => bcrypt('admin@gmail.com'),
        ]);
    }
}
