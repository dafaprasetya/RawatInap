<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DokterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/auth/{provider}', [LoginController::class,'redirectToProvider']);

Route::get('/auth/{provider}/callback',[LoginController::class,'handleProviderCallback']);

Auth::routes();
Route::get('/', function(){
    if (auth()->user()) {
        # code...
        if (auth()->user()->role == 'admin') {
            return redirect()->route('index');
        }
        elseif (auth()->user()->role == 'dokter') {
            return redirect()->route('dokter_index');
        }
    }else {

        return redirect()->route('login');
    }
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class,'index'])->name('index');
    Route::get('/admin/pasien/invoice/{id}', [AdminController::class,'invoice'])->name('invoicess');
    Route::get('/admin/pasien/selesai', [AdminController::class,'pasiendone'])->name('pasiendone');
    Route::get('/admin/pasien/buat', [AdminController::class,'buatpasien'])->name('buatpasien');
    Route::post('/admin/pasien/buat/send', [AdminController::class,'buatpasienp'])->name('buatpasienpost');
    Route::get('/admin/dokter/buat', [AdminController::class,'buatdokter'])->name('buatdokter');
    Route::post('/admin/dokter/buat/send', [AdminController::class,'buatdokterp'])->name('buatdokterpost');
    Route::get('/admin/pasien/dirawat',[AdminController::class, 'pasiendirawat'])->name('dirawat');
    Route::get('/admin/pasien/kunjungan/check-up/{id}', [DokterController::class,'checkup'])->name('lihatkunjungan');
});
Route::middleware(['auth','role:dokter'])->group(function () {
    Route::get('/dokter', [DokterController::class,'index'])->name('dokter_index');
    Route::get('/dokter/kunjungan', [DokterController::class,'index'])->name('dokter_allkunjungan');
    Route::get('/dokter/kunjungan/buat', [DokterController::class,'buatvisit'])->name('dokter_kunjungan');
    Route::get('/dokter/kunjungan/check-up/{id}', [DokterController::class,'checkup'])->name('dokter_checkup');
    Route::post('/dokter/kunjungan/check-up/perkembangan/{id}', [DokterController::class,'perkembangan'])->name('dokter_perkembangan');
    Route::post('/dokter/kunjungan/buat/send', [DokterController::class,'buatvisitp'])->name('dokter_kunjunganp');
});
