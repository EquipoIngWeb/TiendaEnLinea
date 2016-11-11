<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new App\Role();
        $role->id ="user";
        $role->name ="Usuario";
        $role->save();

        $role = new App\Role();
        $role->id ="admin";
        $role->name ="Administrador";
        $role->save();
    }
}
