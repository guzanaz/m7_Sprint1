<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //Login Function
    public function loginApi(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($request-> only('email', 'password'))){
        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('tokeninitlab')->plainTextToken;
        $response = [
            'status'=> true,
            'message'=>'Login successful!',
            'data' =>[
                'user'=>$user,
                'token'=>$token,
                'token_type' => 'Bearer',
            ]
            ];
            return response($response,201);
        }

            throw ValidationException::withMessages([
                'email' => ['Les credencials proporcionades no coincideixen amb els nostres registres.']
            ]);

        }

    //Logout Function
    public function logoutApi()
    {
        Auth::logout();
    }
}

// class LoginController extends Controller
// {
//     //Login Function
//     public function loginApi(Request $request){
//       $request -> validate([
//             'email' => ['required', 'email'],
//             'password' => ['required']
//         ]);

//         if (Auth::attempt($request-> only('email', 'password'))){
//             $token =$r->createToken('authToken')->plainTextToken;
//             return response()->json([
//                 'access_token' => $token,
//                 'token_type' => 'Bearer',
//         ]);
//         }

//         throw ValidationException::withMessages([
//             'email' => ['Les credencials proporcionades no coincideixen amb els nostres registres.']
//         ]);
//     }

//     //Logout Function
//     public function logoutApi(){
//         Auth::logout();
//     }
// }

// class LoginController extends Controller
// {
//     //Login Function
//     public function loginApi(Request $request){
//         $request -> validate([
//             'email' => ['required', 'email'],
//             'password' => ['required']
//         ]);

//         if (Auth::attempt($request-> only('email', 'password'))){
//             return response()->json(Auth::user(), 200);
//         }

//         throw ValidationException::withMessages([
//             'email' => ['Les credencials proporcionades no coincideixen amb els nostres registres.']
//         ]);
//     }

//     //Logout Function
//     public function logoutApi(){
//         Auth::logout();
//     }
// }
