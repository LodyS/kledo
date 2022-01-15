<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use DB;
use Illuminate\Database\Seeder;

class KasbonSeeder extends Seeder
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
            DB::table('kasbon')->insert([
                'pegawai_id'=>random_int(51, 71), // bisa diganti sesuai data di db
                'tanggal_diajukan'=>'2022-01-15',
                'total_kasbon'=>random_int(2000000,5000000),
            ]);
        }
    }
}
