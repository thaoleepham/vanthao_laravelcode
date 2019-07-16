<?php

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

        DB::table('users')->insert(
          [
            'name' => 'admin1',
            'email' => 'thaoleeepham@gmail.com',
            'password' => 'thaopham01',
        // ],[
        //     'name' => str_random(10),
        //     'email' => str_random(10).'@gmail.com',
        //     'password' => bcrypt('secret'),
        // ],[
        //     'name' => str_random(10),
        //     'email' => str_random(10).'@gmail.com',
        //     'password' => bcrypt('secret'),
        // ],[
        //     'name' => str_random(10),
        //     'email' => str_random(10).'@gmail.com',
        //     'password' => bcrypt('secret'),
        // ],[
        //     'name' => str_random(10),
        //     'email' => str_random(10).'@gmail.com',
        //     'password' => bcrypt('secret'),
        // ]]



      ]);      
       //  DB::Users::truncate();
       //  $fake=\Faker\Factory::create();
       //  // create a few User in our databse
       //  $password=Hash::make('toptal');
       
       // User::create([
       // 	'name'=>'Admin',
       // 	'email'=>'thaoleepham@gmail.com'
       // 	'password'=>$password,
       // ]);

       // for($i=0;$i<10;$i++){
       // 		User::create([
       // 			'name'=>$fake->name,
       // 			'email'=>$fake->email,
       // 			'password'=>$password,
       // 		]);
       // }
    }
}
