<?php

use App\Domain\Postlike\Http\Controllers\PostlikeController;
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
        'prefix' => 'like',
        'middlaware' => 'auth:user-api',
    ],
    function () {
        Route::resource('like', PostlikeController::class);
    }
);
