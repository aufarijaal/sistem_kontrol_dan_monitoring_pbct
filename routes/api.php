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

Route::get('sayhello',[App\Http\Controllers\MachineController::class, 'sayHello'])->name('sayhello');

// Get & Set Machine State
Route::get('getmachineinfo',[App\Http\Controllers\MachineController::class, 'getInfo'])->name('getmachinestate');
Route::get('sendstockupdate',[App\Http\Controllers\MachineController::class, 'sendStockUpdate'])->name('sendstockupdate');
Route::get('sendmachinetemp',[App\Http\Controllers\MachineController::class, 'sendTemp'])->name('sendmachinetemp');
Route::post('setmachinepower', [App\Http\Controllers\MachineController::class, 'setMachinePower'])->name('setmachinepower');
// Get & Set Tipe Halus Kasar
Route::post('sethaluskasar', [App\Http\Controllers\MachineController::class, 'setHalusKasar'])->name('sethaluskasar');
// Get Stat
Route::get('getstat',[App\Http\Controllers\StatController::class, 'getStat'])->name('getstat');
// New Production
Route::post('newproduction', [App\Http\Controllers\StatController::class, 'newProduction'])->name('newproduction');
