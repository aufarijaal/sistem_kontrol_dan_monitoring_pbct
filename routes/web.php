<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Auth::user()) {
        return redirect('/home');
    }else if(Auth::guest()) {
        return view('welcome');
    }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/stat', [App\Http\Controllers\StatController::class, 'index'])->name('stat');

Route::get('/pengaturan', [App\Http\Controllers\PengaturanController::class, 'index'])->name('pengaturan');
Route::post('/pengaturan/koneksimesin', [App\Http\Controllers\MachineController::class, 'bindMachineWithUser'])->name('bindmachine');
Route::post('/pengaturan/diskoneksimesin', [App\Http\Controllers\MachineController::class, 'unbindMachineFromUser'])->name('unbindmachine');


