<?php

namespace App\Services;

use App\Http\Requests\WishlistRequest;
use App\Models\Wishlist;

class WishlistService
{
    public function create(WishlistRequest $request, $userId)
    {
        Wishlist::create([
            "user_id" => $userId,
            "desired_price" => $request->price,
            "hotel_service_id" => $request->hotel_service_id
        ]);
    }

    public function deleteWishlistById($id, $userId)
    {
        $wishlist = Wishlist::find($id);
        if($wishlist->user_id != $userId)
        {
            return false;
        }
        $wishlist->delete();
        return true;
    }
}