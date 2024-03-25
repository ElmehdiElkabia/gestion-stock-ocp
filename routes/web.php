<?php

// Controllers

use App\Http\Controllers\ConsomableController;
use App\Http\Controllers\ControllerPDF;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImobilisableController;
use App\Http\Controllers\ImportController;
// Packages
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

require __DIR__ . '/auth.php';





//UI Pages Routs


Route::group(['middleware' => 'auth'], function () {


    // Dashboard Routes
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');


    // consomable
    Route::get('/table/consomables', [ConsomableController::class, 'index'])->name('consomables.index');
    Route::get('/consomable/create', [ConsomableController::class, 'create'])->name('consomables.create');
    Route::post('/consomable/create', [ConsomableController::class, 'store'])->name('consomables.store');
    Route::get('/consomable/{id}/edit', [ConsomableController::class, 'edit'])->name('consomables.edit');
    Route::put('/consomable/{id}', [ConsomableController::class, 'update'])->name('consomables.update');
    Route::delete('/consomable/{id}', [ConsomableController::class, 'destroy'])->name('consomables.destroy');
    Route::get('/consomable/{id}', [ConsomableController::class, 'show'])->name('consomables.show');
    Route::post('/consomable/{id}', [ConsomableController::class, 'show'])->name('consomables.show');
    Route::get('/consomables/{id}/edit', [ConsomableController::class, 'edit'])->name('consomables.edit');
    Route::get('/table/consomables/securite', [ConsomableController::class, 'securite'])->name('consomables.securite');
    Route::get('/consomable/{id}/edit/commande', [ConsomableController::class, 'commande'])->name('consomables.commande');
    Route::put('/consomable/{id}/edit/commande', [ConsomableController::class, 'commande'])->name('consomables.commande');




    // imobilisables
    Route::get('/table/imobilisables', [ImobilisableController::class, 'index'])->name('imobilisables.index');
    Route::get('/imobilisable/create', [ImobilisableController::class, 'create'])->name('imobilisables.create');
    Route::post('/imobilisable/create', [ImobilisableController::class, 'store'])->name('imobilisables.store');
    Route::get('/imobilisable/{id}/edit', [ImobilisableController::class, 'edit'])->name('imobilisables.edit');
    Route::put('/imobilisable/{id}', [ImobilisableController::class, 'update'])->name('imobilisables.update');
    Route::delete('/imobilisable/{id}', [ImobilisableController::class, 'destroy'])->name('imobilisables.destroy');
    Route::get('/imobilisable/{id}', [ImobilisableController::class, 'show'])->name('imobilisables.show');
    Route::post('/imobilisable/{id}', [ImobilisableController::class, 'show'])->name('imobilisables.show');
    Route::get('/imobilisables/{id}/exit',  [ImobilisableController::class, 'exit'])->name('imobilisables.exit');
    Route::get('/imobilisable/{id}/edit/commande', [ImobilisableController::class, 'commande'])->name('imobilisables.commande');
    Route::put('/imobilisable/{id}/edit/commande', [ImobilisableController::class, 'commande'])->name('imobilisables.commande');

    //pdf
    Route::get('/download-pdf-consomble/{id}', [ControllerPDF::class, 'downloadConsomable'])->name('consomables.pdf');
    Route::get('/download-pdf-imobilisable/{id}', [ControllerPDF::class, 'downloadImobilisable'])->name('imobilisables.pdf');

    // history
    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');


    // export
    Route::get('/export/consomables',  [ExportController::class, 'exportConsomables'])->name('consomables.export');
    Route::get('/export/imobilisables',  [ExportController::class, 'exportImobilisables'])->name('imobilisables.export');


    // import 
    Route::post('/import/consomables',  [ImportController::class, 'importConsomables'])->name('consomables.import');
    Route::post('/import/imobilisables',  [ImportController::class, 'importImobilisables'])->name('imobilisables.import');
});






//Auth pages Routs
Route::group(['prefix' => 'auth'], function () {
    Route::get('signin', [HomeController::class, 'signin'])->name('auth.signin');
});
