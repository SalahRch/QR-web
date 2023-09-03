<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/zones/create', [App\Http\Controllers\ZonesController::class, 'create']);

Route::get('/zones/editmenu', [App\Http\Controllers\ZonesController::class, 'editmenu'])->name('zones.editmenu');

Route::get('/zones/deletemenu', [App\Http\Controllers\ZonesController::class, 'deletemenu'])->name('zones.deletemenu');

Route::get('/zones/createuser', [App\Http\Controllers\ZonesController::class, 'createuser'])->name('zones.createuser');

Route::get('/zones/edituser', [App\Http\Controllers\ZonesController::class, 'edituser'])->name('zones.edituser');

Route::get('/zones/display', [App\Http\Controllers\ZonesController::class, 'display'])->name('zones.display');

Route::get('/zones/search', [App\Http\Controllers\ZonesController::class, 'search'])->name('zones.search');

Route::get('/zones/admin' , [App\Http\Controllers\ZonesController::class, 'admin'])->name('zones.admin');

Route::get('/zones/download/{zone_id}', [App\Http\Controllers\ZonesController::class, 'getDownload'])->name('zones.download');

Route::get('/zones/displaypdf', [App\Http\Controllers\ZonesController::class, 'displaypdf'])->name('zones.displaypdf');

Route::post('/zones/create', [App\Http\Controllers\ZonesController::class, 'create'])->name('zones.create');

Route::get('/zones/displayzones/{type}', [App\Http\Controllers\ZonesController::class, 'displayzones']);

Route::post('/zones/displayzones/{type}', [App\Http\Controllers\ZonesController::class, 'displayzones'])->name('zones.displayzones');

Route::get('/zones/pdf-view/{name}', [App\Http\Controllers\ZonesController::class, 'showPDFView'])->name('pdf-view-route');

Route::get('/zones/dp-view/{name}/', [App\Http\Controllers\ZonesController::class, 'showDPView'])->name('dp-view-route');

Route::get('/zones/other-view/{name}/', [App\Http\Controllers\ZonesController::class, 'showOtherView'])->name('other-view-route');

Route::get('/zones/{zone_id}/edit', [App\Http\Controllers\ZonesController::class, 'edit'])->name('zones.edit');

Route::get('/zones/{id}/edituser', [App\Http\Controllers\ZonesController::class, 'editsolo'])->name('zones.editsolo');

Route::get('/zones/{zone_id}/delete', [App\Http\Controllers\ZonesController::class, 'delete'])->name('zones.delete');

Route::get('/zones/{id}/deleteuser', [App\Http\Controllers\Auth\RegisterController::class, 'delete'])->name('users.delete');

Route::get('/zones/deleteuser', [App\Http\Controllers\ZonesController::class, 'deleteuser'])->name('zones.deleteuser');

Route::get('/zones/{zone_id}', [App\Http\Controllers\ZonesController::class, 'index'])->name('zones.show');

Route::put('/zones/{zone_id}', [App\Http\Controllers\ZonesController::class, 'update'])->name('zones.update');

Route::put('/users/{id}', [App\Http\Controllers\Auth\RegisterController::class, 'update'])->name('users.update');

Route::get('/zones/dp/{zone_id}', [App\Http\Controllers\ZonesController::class, 'dp'])->name('zones.dp');

Route::get('/zones/other/{zone_id}', [App\Http\Controllers\ZonesController::class, 'other'])->name('zones.other');

Route::post('/zones', [App\Http\Controllers\ZonesController::class, 'store']);

Route::post('/users', [App\Http\Controllers\Auth\RegisterController::class, 'create']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


