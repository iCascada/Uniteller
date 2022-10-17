<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;

class UserService
{
    public function __construct(private readonly User $user) {}

    public function findByEmail(string $email): ?User
    {
        return $this->user::where('email', $email)?->first();
    }

    public function random(): User
    {
        return $this->user::all()->random();
    }
}
