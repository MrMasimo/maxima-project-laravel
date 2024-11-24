<?php

namespace App\Services\API;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function __construct(protected string $email, protected string $password)
    {

    }

    public function login(): array
    {
        try {
            $this->checkUser();
            return $this->generateToken();
        } catch (ValidationException $e) {
            return [
                'success' => false,
                'status' => 422,
                'message' => $e->getMessage()
            ];
        }
    }

    public function checkUser(): void
    {
        $user = User::where('email', $this->email)->first();
        if (!$user) {
            throw new Exception('User not found');
        }
    }

    public function generateToken(): array
    {

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $user = Auth::user();
            return [
                'success' => true,
                'token' => $user->createToken('RestAPI')->plainTextToken,
                'name' => $user->name,
            ];
        } else {
            throw new Exception('Wrong login or password');
        }
    }
}
