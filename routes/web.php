<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudyProgramController;

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
