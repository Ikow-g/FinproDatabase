<?php

use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
            [
                'nama_kelas' => 'XII RPL 1',
            ],
            [
                'nama_kelas' => 'XII RPL 2',
            ],
            [
                'nama_kelas' => 'XII RPL 3',
            ]
        ]);
    }
}
