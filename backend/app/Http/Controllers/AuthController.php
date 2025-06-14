<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Http;
use Auth;
use Exception;

class AuthController extends Controller
{
    // La verificación de mail la podría hacer desde el propio Laravel, pero para practicar con n8n lo he hecho así
    // TODO: Mejorar estructura siguiendo patrones SOLID
    public function register(CreateUserRequest $request)
    {
        $verification_code = Uuid::uuid4()->toString();;
        $email = $request->email;

        $user = User::create([
            'name' => $request->name,
            'email' => $email,
            'password'=> Hash::make($request->password),
            'verification_code'=> $verification_code
        ]);

        try
        {
            Http::withOptions(['verify' => false])->get(env("N8N_MAIL_WEBHOOK"), [
                'code' => $verification_code,
                'email'=> $email
            ]);
        }
        catch(Exception)
        {
            print "Ha ocurrido un error al intentar mandar la petición a n8n";
        }

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
