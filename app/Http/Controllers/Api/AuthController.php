<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request): UserResource
    { 
        $user = $this->authService->registerUser($request->validated());

        auth()->login($user);

        return new UserResource($user);
    }

    public function login(LoginRequest $request): UserResource
    {
        $user = $this->authService->loginUser($request->validated());

        return new UserResource($user);
    }

    public function logout(): JsonResponse
    {
        $this->authService->logoutUser();

        return response()->json(['message' => 'Delogare reușită.']);
    }
    
    public function user(Request $request): UserResource
    {
        return new UserResource($request->user());
    }
}