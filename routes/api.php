<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\QuoteController;
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


Route::get('login', [AuthController::class, 'login']);
Route::get('signup', [AuthController::class, 'signup']);

Route::group(['middleware' => ['auth:api','throttle:20,1']], function () {
    Route::get('/episodes',[EpisodeController::class, 'getAll']);
    Route::get('/episodes/{id}',[EpisodeController::class, 'getSingleEpisode']);
    Route::get('/characters',[CharacterController::class, 'getAll']);
    Route::get('/characters/random',[CharacterController::class, 'getRandomCharacter']);
    Route::get('/quotes',[QuoteController::class, 'getAll']);
    Route::get('/quotes/random',[QuoteController::class, 'getRandomQuote']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
