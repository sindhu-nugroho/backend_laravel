<?php

namespace App\Http\Controllers;

use App\Services\Auth\AuthServiceInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private AuthServiceInterface $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function loginSanctum(Request $request)
    {
        return response()->json(
            $this->authService->loginSanctum($request->all())
        );
    }

    public function loginJwt(Request $request)
    {
        return response()->json(
            $this->authService->loginJwt($request->all())
        );
    }

    public function register(Request $request)
    {
        return response()->json(
            $this->authService->register($request->all())
        );
    }

    public function logout(Request $request)
    {
        $this->authService->logout($request->user());
        return response()->json(['message' => 'Logout sukses']);
    }
}
