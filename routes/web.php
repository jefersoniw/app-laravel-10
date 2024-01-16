<?php

use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Site\SiteController;
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

Route::get('/', [SiteController::class, 'index']);

Route::get('/contato', [SiteController::class, 'contact']);

route::group(['prefix' => 'supports'], function () {
  route::get('/', [SupportController::class, 'index'])->name('supports.index');
  route::get('/create', [SupportController::class, 'create'])->name('supports.create');
  route::post('/', [SupportController::class, 'store'])->name('supports.store');
});
