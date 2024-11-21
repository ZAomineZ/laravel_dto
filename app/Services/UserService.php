<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\UserDTO;
use App\Models\User;

final class UserService
{
    public function createUser(UserDTO $userDTO): User
    {
        $user = new User();

        $user->name = $userDTO->name;
        $user->email = $userDTO->email;
        $user->phone = $userDTO->phone;

        $user->save();

        return $user;
    }
}
