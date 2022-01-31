<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudyProgramController;
use App\Http\Controllers\VirtualMachineController;

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
    return view('welcome');
});

Route::get('StudyProgram',[StudyProgramController::class,'index'])->name('StudyProgram.index');
Route::get('StudyProgram/create',[StudyProgramController::class,'create'])->name('StudyProgram.create');
Route::post('StudyProgram', [StudyProgramController::class,'store'])->name('StudyProgram.store');
Route::get('StudyProgram/{program}',[StudyProgramController::class,'show'])->name('StudyProgram.show');
Route::get('StudyProgram/{program}/edit',[StudyProgramController::class,'edit'])->name('StudyProgram.edit');
Route::put('StudyProgram/{program}', [StudyProgramController::class,'update']) ->name('StudyProgram.update');
Route::delete('StudyProgram{program}',[StudyProgramController::class,'destroy']) ->name('StudyProgram.destroy');

Route::get('VirtualMachine',[VirtualMachineController::class,'index'])->name('VirtualMachine.index');
Route::get('VirtualMachine/create',[VirtualMachineController::class,'create'])->name('VirtualMachine.create');
Route::post('VirtualMachine', [VirtualMachineController::class,'store'])->name('VirtualMachine.store');
Route::get('VirtualMachine/show/{id}',[VirtualMachineController::class,'show'])->name('VirtualMachine.show');
