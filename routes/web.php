<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Antrian;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

use App\Livewire\Dashboard\DaftarPoli\DashboardPoliUmum;
use App\Livewire\Dashboard\DaftarPoli\DashboardPoliGigi;
use App\Livewire\Dashboard\DaftarPoli\DashboardPoliBalita;
use App\Livewire\Dashboard\Laporan\ShowLaporan;
use App\Livewire\Antrian\ShowAntrian;

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
    return view('home');
})->name('home.page');

Auth::routes();

Route::middleware('auth')->group(function () {
    // Rute Antrian (Hanya untuk pengguna yang login) Dihandle langsung oleh Livewire
    Route::get('antrian', ShowAntrian::class)->name('antrian.index');

    // Rute khusus admin
    Route::group(['middleware' => 'role:admin'], function () {
        Route::get('dashboard', \App\Livewire\Dashboard\DashboardIndex::class)->name('dashboard.index');

        // Full-page Livewire components untuk Poli
        Route::get('dashboard/antrian/poliUmum', DashboardPoliUmum::class)->name('dashboard.poliUmum');
        Route::get('dashboard/antrian/poliGigi', DashboardPoliGigi::class)->name('dashboard.poliGigi');
        Route::get('dashboard/antrian/poliBalita', DashboardPoliBalita::class)->name('dashboard.poliBalita');

        // Full-page Livewire component untuk Laporan
        Route::get('dashboard/laporan/index', ShowLaporan::class)->name('dashboard.laporan');
        
        // Cetak Laporan - Logic dipindahkan kemari untuk mengurangi penggunaan redundant controller
        Route::get('livewire/dashboard/laporan/cetakLaporan', function (Request $request) {
            $tanggal_antrian = $request->query('tanggal_antrian');

            if($tanggal_antrian == "today"){
                $laporan = Antrian::where('tanggal_antrian', Carbon::now()->toDateString())->where('is_call', 1)->get();
            }else if ($tanggal_antrian == "week") {
                $laporan = Antrian::whereBetween('tanggal_antrian', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('is_call', 1)->get();
            }else if ($tanggal_antrian == "month"){
                $laporan = Antrian::whereMonth('tanggal_antrian', Carbon::now()->month)->where('is_call', 1)->get();
            }else {
                $laporan = Antrian::where('is_call', 1)->get();
            } 
            
            $pdf = PDF::loadView('livewire.dashboard.laporan.cetakLaporan', compact('laporan'));
            return $pdf->stream('laporan.pdf');
        })->name('cetakLaporan');
    });
});
