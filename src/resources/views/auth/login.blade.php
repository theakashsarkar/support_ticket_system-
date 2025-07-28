@extends('layouts.auth')

@section('page_type', 'login')

@section('content')

        <div class="flex items-center justify-center min-h-screen bg-gray-100">
            <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-lg">
                <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Login to Your Account</h2>

                <!-- Success message -->
                @if(session('success'))
                    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Error messages -->
                @if($errors->any())
                    <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                        <ul class="list-disc pl-5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}"
                      x-data="{
                  email: '',
                  password: '',
                  showPassword: false
              }">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                        <input type="email" name="email" x-model="email"
                               class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                               placeholder="Enter your email" required />
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                        <div class="relative">
                            <input :type="showPassword ? 'text' : 'password'" name="password" x-model="password"
                                   class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                                   placeholder="Enter your password" required />
                            <button type="button" @click="showPassword = !showPassword"
                                    class="absolute right-3 top-2 text-gray-500 hover:text-gray-800 text-sm">
                                <span x-text="showPassword ? 'Hide' : 'Show'"></span>
                            </button>
                        </div>
                    </div>

                    <div class="mb-6">
                        <button type="submit"
                                class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">
                            Login
                        </button>
                    </div>

                    <div class="text-sm text-center text-gray-600">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register</a>
                    </div>
                </form>
            </div>
        </div>
@endsection

