<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;

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
}
