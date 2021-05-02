<?php
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Res;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('country',[ApiController::class, 'country']);
// Route::get('country/{id}',[ApiController::class, 'countryById']);
// Route::post('country',[ApiController::class, 'countrySave']);

Route::apiResource('country',Res::class);
Route::get('file',[ApiController::class, 'filedownload']);
Route::post('file',[ApiController::class, 'fileupload']);



