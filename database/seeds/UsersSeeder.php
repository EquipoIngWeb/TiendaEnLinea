<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\User();
        $user->username ="rafael";
        $user->full_name ="Rafael Gonzalez Castro";
        $user->email ="rafa.gc2807@gmail.com";
        $user->password ="asd123";
        $user->confirmed =1;
        $user->role_id ="admin";
        $user->save();


        $user = new App\User();
        $user->username ="aida";
        $user->full_name ="Aida Lizeth Rochin";
        $user->email ="aidarochin@gmail.com";
        $user->password ="soloyo";
        $user->role_id ="admin";
        $user->confirmed =1;

        $user->save();
        factory(App\User::class, 5)->create();



    }
}
