<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Spk\KomputerController;
use App\Http\Controllers\Spk\KriteriaController;
use App\Http\Controllers\Spk\BobotController;

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

// ROUTE SPK KOMPUTER
Route::get('komputer', [KomputerController::class, 'index'])->name('komputer.list');
Route::get('komputer/show/{id}', [KomputerController::class, 'show'])->name('komputer.show');
Route::get('komputer/add', [KomputerController::class, 'create'])->name('komputer.create');
Route::post('komputer/store', [KomputerController::class, 'store'])->name('komputer.add');
Route::get('komputer/edit/{id}', [KomputerController::class, 'edit'])->name('komputer.edit');
Route::post('komputer/update/{id}', [KomputerController::class, 'update'])->name('komputer.update');
Route::get('komputer/delete/{id}', [KomputerController::class, 'destroy'])->name('komputer.destroy');
// ROUTE SPK KRITERIA
Route::get('kriteria', [KriteriaController::class, 'index'])->name('kriteria.list');
Route::get('kriteria/show/{id}', [KriteriaController::class, 'show'])->name('kriteria.show');
Route::get('kriteria/add', [KriteriaController::class, 'create'])->name('kriteria.create');
Route::post('kriteria/store', [KriteriaController::class, 'store'])->name('kriteria.add');
Route::get('kriteria/edit/{id}', [KriteriaController::class, 'edit'])->name('kriteria.edit');
Route::post('kriteria/update/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');
Route::get('kriteria/delete/{id}', [KriteriaController::class, 'destroy'])->name('kriteria.destroy');
// ROUTE SPK BOBOT
Route::get('bobot', [BobotController::class, 'index'])->name('bobot.list');
Route::get('bobot/show/{id}', [BobotController::class, 'show'])->name('bobot.show');
Route::get('bobot/add', [BobotController::class, 'create'])->name('bobot.create');
Route::post('bobot/store', [BobotController::class, 'store'])->name('bobot.add');
Route::get('bobot/edit/{id}', [BobotController::class, 'edit'])->name('bobot.edit');
Route::post('bobot/update/{id}', [BobotController::class, 'update'])->name('bobot.update');
Route::get('bobot/delete/{id}', [BobotController::class, 'destroy'])->name('bobot.destroy');
