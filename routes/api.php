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

Route::get('/StudyProgram', 'app/Http/Controllers/StudyProgramController@index');//mostrar todos los registros
Route::get('/StudyProgram/create', 'app/Http/Controllers/StudyProgramController@create');//crear un registro
Route::post('/StudyProgram', 'app/Http/Controllers/StudyProgramController@store');//guardar un registro
Route::get('/StudyProgram/{program}', 'app/Http/Controllers/StudyProgramController@show');//mostrar un registro
Route::get('/StudyProgram/{program}/edit', 'app/Http/Controllers/StudyProgramController@edit');//editar un registro
Route::put('/StudyProgram/{program}', 'app/Http/Controllers/StudyProgramController@update');//actualizar un registro
Route::delete('/StudyProgram{program}', 'app/Http/Controllers/StudyProgramController@destroy');//eliminar un registro

Route::get('/VirtualMachine', 'app/Http/Controllers/VirtualMachineController@index');
Route::get('/VirtualMachine/create','app/Http/Controllers/VirtualMachineController@create');
Route::post('/VirtualMachine', 'app/Http/Controllers/VirtualMachineController@store');
Route::get('/VirtualMachine/show/{virtualMachine}','app/Http/Controllers/VirtualMachineController@show');
Route::get('/VirtualMachine/{virtualMachine}/edit','app/Http/Controllers/VirtualMachineController@edit');
Route::put('/VirtualMachine/{virtualMachine}', 'app/Http/Controllers/VirtualMachineController@update');
Route::delete('/VirtualMachine{virtualMachine}','app/Http/Controllers/VirtualMachineController@destroy');