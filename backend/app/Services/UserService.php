<?php

namespace App\Services;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\VerifyUserRequest;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Http;
use Auth;
use Hash;

class UserService
{
    public function getAuthorizedUser()
    {
        $user = Auth::user();
        return $user;
    }

    public function getCompleteUser()
    {
        $currentUser = $this->getAuthorizedUser();

        $completeUser = User::with(['wishlists', 'wishlists.hotelService.service',
            'wishlists.hotelService.hotel' => function($query) {
                $query->where('id', '!=', 1);
            }
        ])->find($currentUser->id);

        return $completeUser;
    }

    // La verificación de mail la podría hacer desde el propio Laravel, pero para practicar con n8n lo he hecho así
    public function registerUser(CreateUserRequest $request)
    {
        $verification_code = Uuid::uuid4()->toString();
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

        return $user->createToken("API TOKEN")->plainTextToken;
    }

    public function loginUser(LoginRequest $request)
    {
        if(!Auth::attempt($request->only(["email","password"])))
        {
            return null;
        }

        $user = User::where('email', $request->email)->first();

        if($user == null || $user->is_verified == false)
        {
            return null;
        }

        return $user->createToken("API TOKEN")->plainTextToken;
    }

    public function verifyUser(VerifyUserRequest $request)
    {
        $user = User::where([
            'email' => $request->email,
            'verification_code'=> $request->code
            ])->first();

        if (!$user) 
        {
            return false;
        }

        $user->is_verified = true;
        $user->save();

        return true;
    }

    public function updateUser(UpdateUserRequest $request)
    {
        $user = $this->getAuthorizedUser();

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        if($user->email != $email)
        {
            $otherUser = User::where('email', $email)->first();
            if($otherUser != null)
            {
                return false;
            }
            $user->email = $email;
        }

        $user->name = $name;

        if($password != null)
        {
            $user->password = Hash::make($password);
        }

        $user->save();
        
        return true;
    }
}