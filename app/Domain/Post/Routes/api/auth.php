<?php

use App\Domain\Post\Http\Controllers\PostController;
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
        'prefix' => 'post',
        'middleware' => 'auth:user-api',
    ],
    function () {
        Route::resource('post', PostController::class);
    }
);
