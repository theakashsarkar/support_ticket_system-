<?php

namespace App\Http\Services\Interfaces;

interface AuthServiceInterface
{
    public function login(array $credentials, bool $remember = false);
    public function register(array $data);
    public function logout(): void;
}