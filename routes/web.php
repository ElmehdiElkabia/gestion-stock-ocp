<?php

// Controllers

use App\Http\Controllers\ConsomableController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImobilisableController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ControllerPDF;
use Illuminate\Support\Facades\Artisan;
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

require __DIR__.'/auth.php';

Route::get('/storage', function () {
    Artisan::call('storage:link');
});




//UI Pages Routs
Route::get('/', [HomeController::class, 'uisheet'])->name('uisheet');

Route::group(['middleware' => 'auth'], function () {


    // Dashboard Routes
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Users Module
    Route::resource('users', UserController::class);
});



//App Details Page => 'special-pages'], function() {
Route::group(['prefix' => 'special-pages'], function() {
 
    Route::get('timeline', [HomeController::class, 'timeline'])->name('special-pages.timeline');
});

//Widget Routs
Route::group(['prefix' => 'widget'], function() {
    Route::get('widget-basic', [HomeController::class, 'widgetbasic'])->name('widget.widgetbasic');
    Route::get('widget-chart', [HomeController::class, 'widgetchart'])->name('widget.widgetchart');
    Route::get('widget-card', [HomeController::class, 'widgetcard'])->name('widget.widgetcard');
});



//Auth pages Routs
Route::group(['prefix' => 'auth'], function() {
    Route::get('signin', [HomeController::class, 'signin'])->name('auth.signin');
});

//Error Page Route
Route::group(['prefix' => 'errors'], function() {
    Route::get('error404', [HomeController::class, 'error404'])->name('errors.error404');
    Route::get('error500', [HomeController::class, 'error500'])->name('errors.error500');
    Route::get('maintenance', [HomeController::class, 'maintenance'])->name('errors.maintenance');
});


//Forms Pages Routs
Route::group(['prefix' => 'forms'], function() {
    Route::get('element', [HomeController::class, 'element'])->name('forms.element');
    Route::get('wizard', [HomeController::class, 'wizard'])->name('forms.wizard');
    Route::get('validation', [HomeController::class, 'validation'])->name('forms.validation');
});








// consomable
Route::get('/table/consomables/securite', [ConsomableController::class, 'securite'])->name('consomables.securite');
Route::get('/table/consomables', [ConsomableController::class, 'index'])->name('consomables.index');
Route::get('/consomable/create', [ConsomableController::class, 'create'])->name('consomables.create');
Route::post('/consomable/create', [ConsomableController::class, 'store'])->name('consomables.store');
Route::get('/consomable/{id}/edit', [ConsomableController::class, 'edit'])->name('consomables.edit');
Route::put('/consomable/{id}', [ConsomableController::class, 'update'])->name('consomables.update');
Route::delete('/consomable/{id}', [ConsomableController::class, 'destroy'])->name('consomables.destroy');
Route::get('/consomable/{id}', [ConsomableController::class, 'show'])->name('consomables.show');
Route::get('/consomables/{id}/edit', [ConsomableController::class, 'edit'])->name('consomables.edit');

// imobilisables
Route::get('/table/imobilisables', [ImobilisableController::class, 'index'])->name('imobilisables.index');
Route::get('/table/imobilisables/securite', [ImobilisableController::class, 'securite'])->name('imobilisables.securite');
Route::get('/table/consomables/securite', [ConsomableController::class, 'securite'])->name('consomables.securite');
Route::get('/imobilisable/create', [ImobilisableController::class, 'create'])->name('imobilisables.create');
Route::post('/imobilisable/create', [ImobilisableController::class, 'store'])->name('imobilisables.store');
Route::get('/imobilisable/{id}/edit', [ImobilisableController::class, 'edit'])->name('imobilisables.edit');
Route::put('/imobilisable/{id}', [ImobilisableController::class, 'update'])->name('imobilisables.update');
Route::delete('/imobilisable/{id}', [ImobilisableController::class, 'destroy'])->name('imobilisables.destroy');
Route::get('/imobilisable/{id}', [ImobilisableController::class, 'show'])->name('imobilisables.show');


// history
Route::get('/history', [HistoryController::class, 'index'])->name('history.index');


// export
Route::get('/export',  [ExportController::class, 'exportConsomables'])->name('consomables.export');
//pdf
Route::get('/download-Consomable-pdf/{id}', [ControllerPDF::class,'downloadConsomablePdf'])->name('download-Consomable-pdf');
Route::get('/download-imobilisable-pdf/{id}', [ControllerPDF::class,'downloadImobilisablePdf'])->name('download-Imobilisable-pdf');
//excel
Route::get('/export-consomables', 'App\Http\Controllers\ConsomableController@export')->name('export-consomables');
