<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    /**
     * Înregistrează un utilizator nou.
     *
     * @param array $data Datele validate din request (nume, email, parolă)
     * @return User Modelul User nou creat
     */
    public function registerUser(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Autentifică un utilizator.
     *
     * @param array $credentials Datele validate (email, parolă)
     * @return User Modelul User autentificat
     * @throws ValidationException
     */
    public function loginUser(array $credentials): User
    {
        if (! auth()->attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => ['Credențialele furnizate nu sunt corecte.'],
            ]);
        }

        request()->session()->regenerate();

        return auth()->user();
    }

    public function logoutUser(): void
    {
        auth()->guard('web')->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
    }
}