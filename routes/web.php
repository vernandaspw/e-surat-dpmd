<?php

use App\Http\Controllers\authController;
use App\Http\Livewire\AkunPage;
use App\Http\Livewire\Home;
use App\Http\Livewire\LoginPage;
use App\Http\Livewire\SuratKeluarDetailPage;
use App\Http\Livewire\SuratKeluarPage;
use App\Http\Livewire\SuratMasukDetailPage;
use App\Http\Livewire\SuratMasukPage;
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

Route::get('login', LoginPage::class)->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/', Home::class);
    Route::get('akun', AkunPage::class);
    Route::get('surat-masuk', SuratMasukPage::class);
    Route::get('surat-masuk/{id}', SuratMasukDetailPage::class);
    Route::get('surat-keluar', SuratKeluarPage::class);
    Route::get('surat-keluar/{id}', SuratKeluarDetailPage::class);

    Route::get('logout', [authController::class, 'logout']);
});
