<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Get & Set Machine State
Route::get('getmachineinfo',[App\Http\Controllers\MachineController::class, 'getInfo'])->name('getmachinestate');
Route::get('sendmachineinfo',[App\Http\Controllers\MachineController::class, 'sendInfo'])->name('sendmachineinfo');
Route::post('setmachinepower', [App\Http\Controllers\MachineController::class, 'setMachinePower'])->name('setmachinepower');
// Get & Set Tipe Halus Kasar
Route::post('sethaluskasar', [App\Http\Controllers\MachineController::class, 'setHalusKasar'])->name('sethaluskasar');
// Get Stat
Route::get('getstat',[App\Http\Controllers\StatController::class, 'getStat'])->name('getstat');
