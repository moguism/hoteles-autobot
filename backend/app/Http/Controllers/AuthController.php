<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use Auth;

class AuthController extends Controller
{
    public function register(CreateUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=> Hash::make($request->password),
            'verification_code'=> Uuid::uuid4()
        ]);

        return response()->json([
            'status' => true,
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        if(!Auth::attempt($request->only(["email","password"])))
        {
            return response()->json([
                "status" => false,
            ], 401);
        }

        $user = User::where('email', $request->email)->first();

        if($user == null || $user->is_verified == false)
        {
            return response()->json([
                'status'=> false,
            ], status: 401);
        }

        return response()->json([
            'status'=> true,
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
}
