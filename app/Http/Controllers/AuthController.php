<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        //$data = $request->all();
        $request->validate([
            'email'=> 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($request->only(['email', 'password']))) {
            /** @var User */
            $user = auth()->user();
            $token = $user->createToken('token-api');
            return response([
                'token' => $token->plainTextToken,
            ]);
        }else {
            return response(['Os dados são inválidos.']);
        }

        //logger("DATA", $data);

        
    }
}
