<?php

use App\Domain\Admin\Http\Controllers\AdminloginController;
use App\Domain\Admin\Http\Controllers\AdminregisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(
    [
        'prefix' => 'admin',
    ],
    function () {
        Route::post('register', [AdminregisterController::class, 'store']);
        Route::post('login', [AdminloginController::class, 'store']);
    }
);
