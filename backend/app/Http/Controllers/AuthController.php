<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\VerifyUserRequest;
use App\Services\UserService;

class AuthController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(CreateUserRequest $request)
    {
        $token = $this->userService->registerUser($request);
        return response()->json([
            'status' => true,
            'token' => $token
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $token = $this->userService->loginUser($request);
        if($token == null)
        {
            return response()->json([
                "status" => false,
            ], 401);   
        }

        return response()->json([
            'status'=> true,
            'token' => $token
        ], 200);
    }

    public function verifyAccount(VerifyUserRequest $request)
    {
        $couldVerify = $this->userService->verifyUser($request);
        if($couldVerify == false)
        {
            return response()->json([
                'status' => false,
            ], 401);
        }

        $external_uri = 'http://localhost:4200?verified=true'; 
        return redirect()->to($external_uri)->send();
    }
}
