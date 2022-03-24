<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function loginApi(Request $request){
        $request -> validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($request-> only('email', 'password'))){
            return response()->json(Auth::user(), 200);
        }

        throw ValidationException::withMessages([
            'email' => ['Les credencials proporcionades no coincideixen amb els nostres registres.']
        ]);
       
    }
}
