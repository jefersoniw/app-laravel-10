<?php

use App\Http\Controllers\Admin\ReplySupportController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
  return view('welcome');
});

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::get('/', [SiteController::class, 'index']);

  Route::get('/contato', [SiteController::class, 'contact']);

  route::group(['prefix' => 'supports'], function () {

    route::delete('/{supportId}/replies/{id}', [ReplySupportController::class, 'destroy'])->name('replies.delete');
    route::post('/{id}/replies', [ReplySupportController::class, 'store'])->name('replies.store');
    route::get('/{id}/replies', [ReplySupportController::class, 'index'])->name('replies.index');

    route::delete('/delete/{id}', [SupportController::class, 'delete'])->name('supports.delete');
    route::get('/', [SupportController::class, 'index'])->name('supports.index');
    route::get('/create', [SupportController::class, 'create'])->name('supports.create');
    route::post('/', [SupportController::class, 'store'])->name('supports.store');
    route::get('/support/edit/{id}', [SupportController::class, 'edit'])->name('supports.edit');
    route::put('/{support}', [SupportController::class, 'update'])->name('supports.update');
  });
});

require __DIR__ . '/auth.php';
