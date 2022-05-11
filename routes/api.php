<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VirtualMachineController;
use App\Http\Controllers\AuthController;
use Illuminate\Auth\Events\Login;
use App\Http\Controllers\LoginController;

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



//Login Route
Route::post('/login', [LoginController::class, 'loginApi'])->name('login.loginApi');

//logout Route
Route::post('/logout', [LoginController::class, 'logoutApi'])->name('logout.logoutApi');

//api user
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors']], function () {

    //store
    Route::post('VirtualMachine', [VirtualMachineController::class, 'storeApi'])->name('VirtualMachine.storeApi');
    //list all VMs
    Route::get('VirtualMachine', [VirtualMachineController::class, 'indexApi'])->name('VirtualMachine.indexApi');
    //show VM specific info
    Route::get('VirtualMachine/show/{virtualMachine}', [VirtualMachineController::class, 'showApi'])->name('VirtualMachine.showApi');
    //arrancar VM
    Route::post('VirtualMachine/start/{virtualMachine}', [VirtualMachineController::class, 'startVM'])->name('VirtualMachine.startVM');
    //detener VM
    Route::post('VirtualMachine/stop/{virtualMachine}', [VirtualMachineController::class, 'stopVM'])->name('VirtualMachine.stopVM');
    //delete VM
    Route::delete('VirtualMachine/{virtualMachine}', [VirtualMachineController::class, 'destroyApi'])->name('VirtualMachine.destroyApi');
    //Virtual Machines
    Route::put('VirtualMachine/{virtualMachine}', [VirtualMachineController::class, 'updateApi'])->name('VirtualMachine.updateApi');
});
