<?php

namespace App\Http\Controllers;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Requests\PegawaiRequest;

class PegawaiAPIController extends Controller
{

    public function index()
    {
        $data = Pegawai::get(['id', 'nama', 'tanggal_masuk', 'total_gaji']);

        return response()->json([
            'success'=>true,
            'message'=>'Daftar Karyawan',
            'data'=>$data
        ],200);
    }

    public function store (PegawaiRequest $request)
    {
        $data = Pegawai::create($request->all());

        return response()->json([
            'success'=>true,
            'message'=>'Berhasil simpan data',
            'data'=>$data
        ],201);
    }
}
