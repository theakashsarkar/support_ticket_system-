<?php

namespace App\Http\Services;

use App\Http\Services\Auth\LoginService;
use App\Http\Services\Auth\LogoutService;
use App\Http\Services\Auth\RegisterService;
use App\Http\Services\Interfaces\AuthServiceInterface;

class AuthService implements AuthServiceInterface
{
    public function __construct(
        private readonly LoginService    $loginService,
        private readonly RegisterService $registerService,
        private LogoutService            $logoutService,
    ) {}
    public function login(array $credentials, bool $remember = false): bool
    {
        return $this->loginService->attempt($credentials, $remember);
    }
    public function logout(): void
    {
        // TODO: Implement logout() method.
    }

    public function register(array $data)
    {
       return $this->registerService->register($data);
    }

}