<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudyProgramController;
use App\Http\Controllers\VirtualMachineController;

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
Route::group(['middleware' => ['cors']], function () {
    Route::get('StudyProgram',[StudyProgramController::class,'indexApi'])->name('StudyProgram.index');
    Route::get('StudyProgram/create',[StudyProgramController::class,'create'])->name('StudyProgram.create');
    Route::post('StudyProgram', [StudyProgramController::class,'store'])->name('StudyProgram.store');
    Route::get('StudyProgram/{program}',[StudyProgramController::class,'show'])->name('StudyProgram.show');
    Route::get('StudyProgram/{program}/edit',[StudyProgramController::class,'edit'])->name('StudyProgram.edit');
    Route::put('StudyProgram/{program}', [StudyProgramController::class,'update']) ->name('StudyProgram.update');
    Route::delete('StudyProgram{program}',[StudyProgramController::class,'destroy']) ->name('StudyProgram.destroy');
    
    Route::get('VirtualMachine',[VirtualMachineController::class,'indexApi'])->name('VirtualMachine.indexApi');
    Route::get('VirtualMachine/create',[VirtualMachineController::class,'createApi'])->name('VirtualMachine.createApi');
    Route::post('VirtualMachine', [VirtualMachineController::class,'storeApi'])->name('VirtualMachine.storeApi');
    Route::get('VirtualMachine/show/{virtualMachine}',[VirtualMachineController::class,'show'])->name('VirtualMachine.show');
    Route::get('VirtualMachine/{virtualMachine}/edit',[VirtualMachineController::class,'edit'])->name('VirtualMachine.edit');
    Route::put('VirtualMachine/{virtualMachine}', [VirtualMachineController::class,'update'])->name('VirtualMachine.update');
    Route::delete('VirtualMachine{virtualMachine}',[VirtualMachineController::class,'destroy'])->name('VirtualMachine.destroy');
});
