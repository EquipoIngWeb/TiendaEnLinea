<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(ColorsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
    }
}


