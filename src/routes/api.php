<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RiderController;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::group(['as' => 'api.'], static function () {
    // API for create new rider
    Route::post('rider', [RiderController::class, 'create'])->name('rider.create');
});
