<?php

use App\Http\Controllers\FillPDFController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SertifikatDashboardController;
use App\Http\Controllers\PesanAdminController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('form');
    });
    Route::get('/pesan-admin', [PesanAdminController::class, 'index']);
    Route::post('/kirim-pesan', [PesanAdminController::class, 'kirimPesan']);
});

Route::post('/pdf', [FillPDFController::class, 'process']);

Route::resource('admin', SertifikatDashboardController::class)->except(['create', 'store']);
