@extends('layouts.auth')

@section('page_type', 'register')

@section('content')

<div class="block items-center lg:justify-center p-6 bg-white border border-gray-200 rounded-lg shadow-sm ">
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="max-w-4xl max-sm:max-w-lg mx-auto p-6 mt-6" >
        <div class="text-center mb-12 sm:mb-16">

            <h4 class="text-slate-600 text-base mt-6">Sign up into your account</h4>
        </div>

        <form
            method="POST"
            action="{{ route('register') }}"
            x-data="{
                fname: '',
                lname: '',
                email: '',
                number: '',
                password: ''
            }"
            @submit="syncInputs"
        >
            @csrf
            <div class="grid sm:grid-cols-2 gap-8">
                <div>
                    <label class="text-slate-900 text-sm font-medium mb-2 block">First Name</label>
                    <input name="fname" x-model="fname" type="text" class="bg-slate-100 w-full text-slate-900 text-sm px-4 py-3 rounded-md focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter name" />
                    @error('fname')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label class="text-slate-900 text-sm font-medium mb-2 block">Last Name</label>
                    <input name="lname" x-model="lname" type="text" class="bg-slate-100 w-full text-slate-900 text-sm px-4 py-3 rounded-md focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter last name" />
                    @error('lname')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label class="text-slate-900 text-sm font-medium mb-2 block">Email</label>
                    <input name="email" x-model="email" type="text" class="bg-slate-100 w-full text-slate-900 text-sm px-4 py-3 rounded-md focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter email" />
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label class="text-slate-900 text-sm font-medium mb-2 block">Password</label>
                    <input name="password" x-model="password" type="password" class="bg-slate-100 w-full text-slate-900 text-sm px-4 py-3 rounded-md focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter password" />
                    @error('number')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-12">
                <button type="submit" class="mx-auto block min-w-32 py-3 px-6 text-sm font-medium tracking-wider rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none cursor-pointer">
                    Sign up
                </button>
            </div>
        </form>
    </div>
</div>
@endsection


