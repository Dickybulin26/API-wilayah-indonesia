<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use AzisHapidin\IndoRegion\IndoRegion;
use App\Http\Controllers\formController;
use App\Http\Controllers\IndoRegionController;

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

Route::get('/form', [IndoRegionController::class, 'form']);
Route::post('/getkabupatens', [IndoRegionController::class, 'getkabupaten'])->name('getkabupatens');
Route::post('/getkecamatan', [IndoRegionController::class, 'getkecamatan'])->name('getkecamatan');
Route::post('/getdesa', [IndoRegionController::class, 'getdesa'])->name('getdesa');
