<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\DTO\UserDTO;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

final class UserController extends Controller
{
    public function __construct(
        private UserService $userService
    ) {}

    public function store(UserRequest $request): JsonResponse
    {
        $request->validated();

        $userDTO = new UserDTO(
            $request->input('name'),
            $request->input('email'),
            $request->input('phone'),
        );

        $user = $this->userService->createUser($userDTO);

        return response()->json($user);
    }
}
