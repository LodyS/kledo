<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests\PegawaiRequest;

class PegawaiController extends Controller
{
    public function index()
    {
        $request = Request::create('/api/pegawai-api', 'GET');
        $response = Route::dispatch($request);
        $responseBody = json_decode($response->getContent(), true);
        $array = $responseBody['data'];

        $data = $this->paginate($array);
        $data->withPath('');

        return view ('pegawai/index', compact('data'));
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function store ()
    {
        return view('pegawai/form');
    }

    public function simpan (PegawaiRequest $request)
    {
        $client = new Client();

        $res = $client->request('POST', 'localhost:8000/api/pegawai-api',[
            'form_params'=>[
                'nama'=>$request->nama,
                'tanggal_masuk'=>$request->tanggal_masuk,
                'total_gaji'=>$request->total_gaji
            ],
        ]);

        return redirect('pegawai/index')->with('success', 'Berhasil kirim data ke API Pegawai');
    }
}
