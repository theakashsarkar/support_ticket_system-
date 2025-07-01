<?php

namespace App\Http\Services\Auth;

use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function attempt(array $credentials, bool $remember = false): bool {
        return Auth::attempt($credentials, $remember);
    }
}