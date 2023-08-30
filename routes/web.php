<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/zones/create', [App\Http\Controllers\ZonesController::class, 'create']);

Route::get('/zones/pdf-view/{name}', [App\Http\Controllers\ZonesController::class, 'showPDFView'])->name('pdf-view-route');

Route::get('/zones/{zone_id}/edit', [App\Http\Controllers\ZonesController::class, 'edit'])->name('zones.edit');

Route::get('/zones/{zone_id}/delete', [App\Http\Controllers\ZonesController::class, 'delete'])->name('zones.delete');

Route::get('/zones/{zone_id}', [App\Http\Controllers\ZonesController::class, 'index'])->name('zones.show');

Route::put('/zones/{zone_id}', [App\Http\Controllers\ZonesController::class, 'update'])->name('zones.update');

Route::post('/zones', [App\Http\Controllers\ZonesController::class, 'store']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
