<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Spk\AlternatifController;
use App\Http\Controllers\Spk\KriteriaController;
use App\Http\Controllers\Spk\PenilaianController;
use App\Http\Controllers\Spk\PilihanKriteriaController;


use Illuminate\Auth\AuthenticationException;
use PhpParser\Node\Name;

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
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-authenticate', [LoginController::class, 'authenticate'])->name('login-auth');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register-store', [RegisterController::class, 'store'])->name('register-add');

Route::get('alternatif', [AlternatifController::class, 'index'])->name('alternatif.list');
Route::get('alternatif/show/{id}', [AlternatifController::class, 'show'])->name('alternatif.show');
Route::get('alternatif/add', [AlternatifController::class, 'create'])->name('alternatif.create');
Route::post('alternatif/store', [AlternatifController::class, 'store'])->name('alternatif.add');
Route::get('alternatif/edit/{id}', [AlternatifController::class, 'edit'])->name('alternatif.edit');
Route::post('alternatif/update/{id}', [AlternatifController::class, 'update'])->name('alternatif.update');
Route::get('alternatif/delete/{id}', [AlternatifController::class, 'destroy'])->name('alternatif.destroy');

Route::get('kriteria', [KriteriaController::class, 'index'])->name('kriteria.list');
Route::get('kriteria/show/{id}', [KriteriaController::class, 'show'])->name('kriteria.show');
Route::get('kriteria/add', [KriteriaController::class, 'create'])->name('kriteria.create');
Route::post('kriteria/store', [KriteriaController::class, 'store'])->name('kriteria.add');
Route::get('kriteria/edit/{id}', [KriteriaController::class, 'edit'])->name('kriteria.edit');
Route::post('kriteria/update/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');
Route::get('kriteria/delete/{id}', [KriteriaController::class, 'destroy'])->name('kriteria.destroy');


