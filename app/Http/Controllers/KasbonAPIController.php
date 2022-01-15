<?php

namespace App\Http\Controllers;
use App\Models\Kasbon;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Http\Requests\KasbonRequest;

class KasbonAPIController extends Controller
{
    public function index ()
    {
        $data = Kasbon::selectRaw('kasbon.id, tanggal_diajukan, tanggal_disetujui, pegawai.nama, total_kasbon')
        ->selectRaw("case when tanggal_disetujui is null then 1 else 2 end as status")
        ->leftJoin('pegawai', 'pegawai.id', 'kasbon.pegawai_id')
        ->get();

        return response()->json([
            'success'=>true,
            'message'=>'Data Kasbon',
            'data'=>$data
        ], 200);
    }

    public function store (KasbonRequest $request)
    {
        $masa = Pegawai::selectRaw('TIMESTAMPDIFF(YEAR, tanggal_masuk, CURDATE()) AS tahun ')
        ->where('id', $request->pegawai_id)
        ->first();

        if ($masa->tahun <1)
        {
            return response()->json([
                'message'=>'Anda tidak bisa melakukan kasbon karena masa kerja Anda dibawah 1 tahun'
            ]);
        }

        $kasbon = Kasbon::selectRaw('pegawai_id, COUNT(pegawai_id) AS jumlah_id')
        ->selectRaw('total_gaji, SUM(total_kasbon) AS total_kasbon')
        ->selectRaw('SUM(total_kasbon)/total_gaji * 100 AS persen_kasbon')
        ->leftJoin('pegawai', 'pegawai.id', 'kasbon.pegawai_id')
        ->where('pegawai_id', $request->pegawai_id)
        ->groupBy('pegawai_id')
        ->first();

        $jumlah_id = ($kasbon == null) ? 0: $kasbon->jumlah_id;
        $persen_kasbon = ($kasbon ==null) ?0 : $kasbon->persen_kasbon;

        if ($jumlah_id >3 || $persen_kasbon > 50)
        {
            return response()->json([
                'message'=>'Jumlah pengajuan kasbon sudah melewati batas 3 kali dalam waktu bulan yang sedang berjalan
                 atau Jumlah pengajuan kasbon sudah melewati batas 50 persen dari gaji Anda'
            ]);
        }

        $data = new Kasbon;

        $data->tanggal_diajukan = date('Y-m-d');
        $data->pegawai_id = $request->pegawai_id;
        $data->total_kasbon = $request->total_kasbon;
        $data->save();

        return response()->json([
            'message'=>'Data kasbon berhasil disimpan',
            'data'=>$data
        ],201);
    }

    public function update (Request $request, $id)
    {
        $data = Kasbon::find($id)->update([
            'tanggal_disetujui'=>date('Y-m-d')
        ]);

        return response()->json(['message'=>'Pengajuan Kasbon telah disetujui']);
    }
}
