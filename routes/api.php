<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('register', [AuthController::class, 'register']);

    Route::group([
        'middleware' => 'jwt.verify'
    ], function() {
        // Route::get('user', 'AuthController@user');
    });
    
});
Route::group([

    // 'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login'])->name("loginAutenticate");
    
    Route::match(['get', 'post'], 'logout', [AuthController::class, 'logout']);
    Route::match(['get', 'post'], 'me', [AuthController::class, 'me']);
    // Route::post('refresh', 'AuthController@refresh');
        // Route::post('me', [AuthController::class, 'me']);

});