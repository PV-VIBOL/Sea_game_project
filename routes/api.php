<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\TicketController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('events', EventController::class);
Route::resource('sports', SportController ::class);
Route::resource('competitions', CompetitionController::class);
Route::resource('addresses', AddressController::class);
Route::resource('tickets', TicketController::class);


Route::get('/getEventFromTicket/{ticket}',[TicketController::class, 'getEventFromTicket']);
Route::get('/getSport/{sport}',[EventController::class, 'getSportFromEvent']);
Route::get('/getEventCompetition/{event}',[CompetitionController::class, 'getEventFromCompetition']);
Route::get('/getAddress/{address}',[EventController::class, 'getAddressFromEvent']);

//search name of event
Route::get('/search/{sport_name}',[EventController::class, 'searchEvent']);
Route::get('/detail/{id}',[EventController::class, 'getDetail']);
