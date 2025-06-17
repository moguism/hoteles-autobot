<?php

namespace App\Http\Controllers;

use App\Http\Requests\WishlistRequest;
use App\Models\Wishlist;
use Auth;

class WishlistController extends Controller
{
    public function createWishlist(WishlistRequest $request)
    {
        $user = Auth::user();

        Wishlist::create([
            "user_id" => $user->id,
            "desired_price" => $request->price,
            "hotel_service_id" => $request->hotel_service_id
        ]);

        return response()->json(["status" => true], status: 201);
    }

    public function deleteWishlistById($id)
    {
        $user = Auth::user();
        $wishlist = Wishlist::find($id);
        if($wishlist->user_id != $user->id)
        {
            return response()->json(["status"=> false], status:401);
        }
        $wishlist->delete();
        return response()->json(["status"=> true], status:204);
    }
}
