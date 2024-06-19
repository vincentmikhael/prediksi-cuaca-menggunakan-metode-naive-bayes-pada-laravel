<?php

use App\Http\Controllers\DataTrainingController;
use App\Http\Controllers\DataUjiController;
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

Route::get('/', [DataTrainingController::class, 'index']);

Route::get('/DataTrainingCuaca', [DataTrainingController::class, 'index']);
Route::post('/DataTrainingCuaca/validation_form', [DataTrainingController::class, 'validation_form']);
Route::get('/DataTrainingCuaca/hapus/{id}', [DataTrainingController::class, 'hapus']);
Route::post('/DataTrainingCuaca/ubah/{id}', [DataTrainingController::class, 'ubah']);

Route::get('/DataUjiCuaca', [DataUjiController::class, 'index'])->name('data-uji-cuaca.index');
Route::post('/DataUjiCuaca/validation_form', [DataUjiController::class, 'validation_form'])->name('data-uji-cuaca.hitung');
Route::get('/DataUjiCuaca/hapus/{id}', [DataUjiController::class, 'hapus'])->name('data-uji-cuaca.hapus');
Route::post('/DataUjiCuaca/ubah/{id}', [DataUjiController::class, 'ubah'])->name('data-uji-cuaca.ubah');
