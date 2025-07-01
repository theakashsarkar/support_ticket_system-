<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Services\Interfaces\AuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    public function __construct(
        private AuthServiceInterface $authService
    ) {}

    public function showLoginForm() {
        return view('auth.login');
    }

    public function showRegisterForm() {
        return view('auth.register');
    }
    public function login(LoginRequest $request) {
        $validateData = $request->validated();
        if($this->authService->login($validateData)) {
            return redirect()->intended(route('dashboard'));
        }
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public  function register(RegisterRequest $request) {
        $validatedData = $request->validated();
        $this->authService->register($validatedData);
        return redirect()
            ->route('login')
            ->with('success', 'Registered successfully');
    }

}
