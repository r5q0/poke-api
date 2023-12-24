<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\StripeController;
/*use 
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/{api}/pokemons', function (Request $request, $api) {
    return DataController::pokemons($request, $api);
});

Route::get('/{api}/stats', function (Request $request, $api) {
    return DataController::stats($request, $api);
});

Route::get('/{api}/berrys', function (Request $request, $api) {
    return DataController::berrys($request, $api);
});


Route::POST('stripe/payment', [StripeController::class, 'paymentEUR'])->name('stripeEUR');
