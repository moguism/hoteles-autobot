<?php

namespace App\Http\Controllers;

use App\Http\Requests\WishlistRequest;
use App\Models\Wishlist;
use App\Services\UserService;
use App\Services\WishlistService;
use Auth;

class WishlistController extends Controller
{
    protected WishlistService $wishlistService;
    protected UserService $userService;

    public function __construct(WishlistService $wishlistService, UserService $userService)
    {
        $this->wishlistService = $wishlistService;
        $this->userService = $userService;
    }

    public function createWishlist(WishlistRequest $request)
    {
        $user = $this->userService->getAuthorizedUser();
        $this->wishlistService->create($request, $user->id);
        return response()->json(["status" => true], status: 201);
    }

    public function deleteWishlistById($id)
    {
        $user = $this->userService->getAuthorizedUser();
        $couldDelete = $this->wishlistService->deleteWishlistById($id, $user->id);
        return response()->json(["status"=> $couldDelete], $couldDelete == true ? 204 : 401);
    }
}
