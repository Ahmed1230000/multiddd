<?php

use App\Domain\Postcomment\Http\Controllers\PostcommentController;
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
        'prefix' => 'comment',
        'middleware' => 'auth:user-api',
    ],
    function () {
        Route::resource('comment', PostcommentController::class);
    }
);
