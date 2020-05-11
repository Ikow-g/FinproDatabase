<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('users')->insert([
            [
                'email' => $faker->email,
                'username' => 'admin',
                'name' => $faker->name,
                'password' => bcrypt('admin'),
            ],
            [
                'email' => $faker->email,
                'username' => Str::random(10),
                'name' => $faker->name,
                'password' => bcrypt('user'),
            ],
        ]);
    }
}
