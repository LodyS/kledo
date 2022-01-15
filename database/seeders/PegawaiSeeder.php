<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use DB;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=1; $i<=10; $i++ )
        {
            DB::table('pegawai')->insert([
                'nama'=>$faker->firstName,
                'tanggal_masuk'=>$faker->dateTime(),
                'total_gaji'=>random_int(4000000,10000000),
            ]);
        }
    }
}
