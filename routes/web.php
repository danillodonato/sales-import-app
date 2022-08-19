<?php

use App\Http\Controllers\VendasController;
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

Route::get('/', [ VendasController::class, 'index'])->name('sales');

Route::get('/sales-import', function () {
    return view('import.index');
})->name('import');

Route::post('/sales-import/send', [ VendasController::class, 'store'])->name('import.send');
