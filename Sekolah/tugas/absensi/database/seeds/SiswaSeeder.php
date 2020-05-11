<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $rspace = &#32;
        $faker = Faker::create('id_ID');
        for($i = 1; $i<=20; $i++)
        {
            DB::table('siswa')->insert([
            'nama' => $faker->name,
            'no_hp' => str_replace('(+62)',"",$faker->phoneNumber) ,
            'jk' => $faker->numberBetween(0,1),
            'id_kelas' => $faker->numberBetween(1,3),
            ]);
        }
    }
}
