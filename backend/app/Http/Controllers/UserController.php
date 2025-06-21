<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Auth;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        $currentUser = Auth::user();

        $completeUser = User::with(['wishlists', 'wishlists.hotelService.service',
            'wishlists.hotelService.hotel' => function($query) {
                $query->where('id', '!=', 1);
            }
        ])->find($currentUser->id);

        return response()->json($completeUser);
    }

    public function updateUser(UpdateUserRequest $request)
    {
        $user = Auth::user();

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        if($user->email != $email)
        {
            $otherUser = User::where('email', $email)->first();
            if($otherUser != null)
            {
                return response()->json(["status" => false], 403);
            }
            $user->email = $email;
        }

        $user->name = $name;

        if($password != null)
        {
            $user->password = Hash::make($password);
        }

        $user->save();

        return response()->json(["status"=> true],200);
    }
}
