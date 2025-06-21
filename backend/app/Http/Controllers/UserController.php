<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;

class UserController extends Controller
{
    protected UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $completeUser = $this->userService->getCompleteUser();
        return response()->json($completeUser);
    }

    public function updateUser(UpdateUserRequest $request)
    {
        $couldUpdate = $this->userService->updateUser($request);
        return response()->json(["status"=> $couldUpdate],$couldUpdate == true ? 200 : 403);
    }
}
