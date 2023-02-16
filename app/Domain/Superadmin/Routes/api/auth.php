<?php

use App\Domain\Superadmin\Http\Controllers\LoginsuperadminController;
use App\Domain\Superadmin\Http\Controllers\RegistersuperadminController;
use App\Domain\Superadmin\Http\Controllers\SuperadminController;
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
        'prefix' => 'superadmin'
    ],
    function () {
        Route::post('register',[RegistersuperadminController::class,'create']);
        Route::post('login',[LoginsuperadminController::class,'store']);
    }
);
