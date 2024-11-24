<?php

namespace App\Actions\Auth;

use App\Http\Requests\API\UserRegisterRequest;
use App\Models\Role;
use App\Models\User;

class RegisterAction
{
    public function register(UserRegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => trim(strtolower($request->email)),
            'password' => bcrypt($request->password),
        ]);

        $role = Role::where('name', 'user')->first();
        $user->roles()->attach($role);

        return [
            'success' => true,
            'message' => 'User created successfully',
            'user' => [
                'id' => $user->id,
                "name" => $user->name,
                "email" => $user->email
            ]
        ];
    }
}
