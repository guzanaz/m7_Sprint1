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

Route::get('StudyProgram',[StudyProgramController::class,'index']);
Route::get('StudyProgram/create',[StudyProgramController::class,'create']);
Route::post('StudyProgram', [StudyProgramController::class,'store']);
Route::get('StudyProgram/{program}',[StudyProgramController::class,'show']);
Route::get('StudyProgram/{program}/edit',[StudyProgramController::class,'edit']);
Route::put('StudyProgram/{program}', [StudyProgramController::class,'update']);
Route::delete('StudyProgram{program}',[StudyProgramController::class,'destroy']);

Route::get('VirtualMachine',[VirtualMachineController::class,'index']);
Route::get('VirtualMachine/create',[VirtualMachineController::class,'create']);
Route::post('VirtualMachine', [VirtualMachineController::class,'store']);
Route::get('VirtualMachine/show/{virtualMachine}',[VirtualMachineController::class,'show']);
Route::get('VirtualMachine/{virtualMachine}/edit',[VirtualMachineController::class,'edit']);
Route::put('VirtualMachine/{virtualMachine}', [VirtualMachineController::class,'update']);
Route::delete('VirtualMachine{virtualMachine}',[VirtualMachineController::class,'destroy']);
