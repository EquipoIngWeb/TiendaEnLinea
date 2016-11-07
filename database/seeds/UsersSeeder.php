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
        factory(App\User::class, 5)->create();
    }
}
