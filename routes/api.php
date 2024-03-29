<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\ReplySupportController;
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

route::post('/login', [AuthController::class, 'auth']);

route::middleware(['auth:sanctum'])->group(function () {

    route::get('/logout', [AuthController::class, 'logout']);
    route::get('/me', [AuthController::class, 'me']);

    route::group(['prefix' => 'supports'], function () {
        route::delete('/replies/{id}', [ReplySupportController::class, 'destroy']);
        route::get('/{id}/replies', [ReplySupportController::class, 'index']);
        route::post('/{id}/replies', [ReplySupportController::class, 'store']);

        route::get('/', [SupportController::class, 'index']);
        route::get('/{id}', [SupportController::class, 'show']);
        route::post('/', [SupportController::class, 'store']);
        route::delete('/delete/{id}', [SupportController::class, 'destroy']);
        route::put('/{id}', [SupportController::class, 'update']);
    });
});
