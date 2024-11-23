<?php

namespace App\Http\Controllers\API;

use App\Actions\Auth\RegisterAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\UserLoginRequest;
use App\Http\Requests\API\UserRegisterRequest;
use App\Services\API\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request, RegisterAction $registerAction): JsonResponse
    {
        $result = $registerAction->register($request);
        return response()->json($result, 201);
    }

    public function login(UserLoginRequest $request): JsonResponse
    {
        $authService = new AuthService($request->email, $request->password);
        $result = $authService->login();
        return response()->json($result, $result['status'] ?? 200);
    }

    public function logout(): JsonResponse
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            'success' => true,
            'message' => 'Logout successfully',
        ]);
    }
}
