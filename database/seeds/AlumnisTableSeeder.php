<?php

use Illuminate\Database\Seeder;

class AlumnisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('alumnis')->insert([
          'name' => 'ALUMNI NJOKU OKECHUKWU VALENTINE',
          'email' => 'alumni@gmail.com',
          'phone' => '07038616871',
          'mat_number' =>'12345623',
          'password' => bcrypt('alumni@gmail.com'),
      ]);

    }
}
