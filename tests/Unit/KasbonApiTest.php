<?php

namespace Tests\Unit;
use Tests\TestCase;
//use PHPUnit\Framework\TestCase;

class KasbonApiTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_kasbon_api()
    {
        //$this->assertTrue(true);
        $value = [
            'tanggal_diajukan'=>'2022-01-15',
            'pegawai_id'=>'66',
            'total_kasbon'=>'450000',
        ];

        $this->post(route('kasbon-api.store'), $value)->assertJson($value)->assertJson($value);
    }
}
