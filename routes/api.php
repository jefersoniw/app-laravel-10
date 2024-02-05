<?php

use App\Http\Controllers\Api\SupportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

route::group(['prefix' => 'supports'], function () {

    route::post('/', [SupportController::class, 'store']);
    route::get('/{id}', [SupportController::class, 'show']);
    route::delete('/delete/{id}', [SupportController::class, 'destroy']);
});
