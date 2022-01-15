<?php

namespace Tests\Unit;
use Tests\TestCase;
//use PHPUnit\Framework\TestCase;

class ApiPegawaiStore extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use WithFaker;

    public function test_pegawai_api()
    {
        //$this->assertTrue(true);

        $value = [
            'nama'=>'Nani',
            'tanggal_masuk'=>'2022-01-01',
            'total_gaji'=>random_int(4000000,10000000),
        ];

        $this->post(route('pegawai-api.store'), $value)->assertStatus(201)->assertJson($value);
    }
}
