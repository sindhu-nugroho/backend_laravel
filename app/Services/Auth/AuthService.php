<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService implements AuthServiceInterface
{
    public function loginSanctum(array $data): array
    {
        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            abort(401, 'Unauthorized');
        }

        return [
            'token' => $user->createToken('api-token')->plainTextToken
        ];
    }

    public function loginJwt(array $data): array
    {
        if (!$token = JWTAuth::attempt($data)) {
            abort(401, 'Unauthorized');
        }

        return ['token' => $token];
    }

    public function register(array $data): User
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function logout(User $user): void
    {
        $user->tokens()->delete();
    }
}
