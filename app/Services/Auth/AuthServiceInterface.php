<?php

namespace App\Services\Auth;

use App\Models\User;

interface AuthServiceInterface
{
    public function loginSanctum(array $data): array;
    public function loginJwt(array $data): array;
    public function register(array $data): User;
    public function logout(User $user): void;
}
