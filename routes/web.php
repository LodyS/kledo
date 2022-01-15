<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('pegawai/index', [PegawaiController::class, 'index']);
Route::get('pegawai/form', [PegawaiController::class, 'store']);
Route::post('kirim-data-pegawai', [PegawaiController::class, 'simpan']);

Route::get('kasbon/index', [KasbonController::class, 'index']);
Route::get('kasbon/form', [KasbonController::class, 'create']);
Route::post('kirim-data-kasbon', [KasbonController::class, 'store']);
Route::get('update-data-kasbon/{id}', [KasbonController::class, 'update']);


Route::get('jajal-job', [KasbonController::class, 'updateAll']);
