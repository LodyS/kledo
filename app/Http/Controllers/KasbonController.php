<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests\KasbonRequest;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KasbonController extends Controller
{
    public function index()
    {
        $request = Request::create('/api/kasbon-api', 'GET');
        $response = Route::dispatch($request);
        $responseBody = json_decode($response->getContent(), true);
        $array = $responseBody['data'];

        $data = $this->paginate($array);
        $data->withPath('');

        return view ('kasbon/index', compact('data'));
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function create ()
    {
        $pegawai = Pegawai::pluck('nama', 'id');
        return view('kasbon/form',  compact('pegawai'));
    }

    public function store (KasbonRequest $request)
    {
        $client = new Client();

        $res = $client->request('POST', 'localhost:8000/api/kasbon-api',[
            'form_params'=>[
                'tanggal_diajukan'=>date('Y-m-d'),
                'pegawai_id'=>$request->pegawai_id,
                'total_kasbon'=>$request->total_kasbon
            ],
        ]);

        return redirect('kasbon/index')->with('success', 'Berhasil kirim data ke API Kasbon');
    }

    public function update (Request $request)
    {
        $response = Http::patch('localhost:8000/api/kasbon-api/'.$request->id, [
            'tanggal_disetujui' => date('Y-m-d'),
        ]);

        return redirect('kasbon/index')->with('success', 'Berhasil update data ke API Kasbon');
    }
}
