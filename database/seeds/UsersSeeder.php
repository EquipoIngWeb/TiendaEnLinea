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
        $user->birthdate =\Carbon\Carbon::now();
        $user->full_name ="Rafael Gonzalez Castro";
        $user->email ="rafa.gc2807@gmail.com";
        $user->password ="asd123";
        $user->role_id ="admin";
        $user->save();

<<<<<<< HEAD

        $user = new App\User();
        $user->username ="aida";
        $user->birthdate =\Carbon\Carbon::now();
        $user->full_name ="Aida Lizeth Rochin";
        $user->email ="aidarochin@gmail.com";
        $user->password ="soloyo";
        $user->role_id ="admin";

=======
	    $user = new App\User();
        $user->username ="aida";
        $user->birthdate =\Carbon\Carbon::now();
        $user->full_name ="Aida Rochin";
        $user->email ="aidarochin@gmail.com";
        $user->password ="Soloyo";
        $user->role_id ="admin";
>>>>>>> b47fa7dd83ab658e42d44ccb115ef8dadf54d1b9
        $user->save();
        factory(App\User::class, 5)->create();



    }
}
