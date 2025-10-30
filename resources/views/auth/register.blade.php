@extends('layouts.main')

@section('title', 'Register')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-center">
        <div class="w-full max-w-md">
            <div class="bg-gray-800 shadow-md rounded-2xl p-8 border border-gray-700">

                {{-- Judul --}}
                <h1 class="text-2xl font-bold text-white text-center mb-6">{{ __('Register') }}</h1>

                {{-- Form Register --}}
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    {{-- Input Nama --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300">
                            {{ __('Nama') }}
                        </label>
                        <div class="mt-1">
                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autocomplete="name"
                                autofocus
                                class="w-full p-3 rounded-md bg-gray-700 border text-white focus:ring-sky-500 focus:border-sky-500 {{ $errors->has('name') ? 'border-red-500' : 'border-gray-600' }}"
                            >
                        </div>
                        @error('name')
                            <p class="mt-2 text-sm text-red-500" role="alert">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Input Email --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300">
                            {{ __('Alamat Email') }}
                        </label>
                        <div class="mt-1">
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                                class="w-full p-3 rounded-md bg-gray-700 border text-white focus:ring-sky-500 focus:border-sky-500 {{ $errors->has('email') ? 'border-red-500' : 'border-gray-600' }}"
                            >
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-500" role="alert">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Input Password --}}
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300">
                            {{ __('Password') }}
                        </label>
                        <div class="mt-1">
                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                class="w-full p-3 rounded-md bg-gray-700 border text-white focus:ring-sky-500 focus:border-sky-500 {{ $errors->has('password') ? 'border-red-500' : 'border-gray-600' }}"
                            >
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-500" role="alert">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Input Konfirmasi Password --}}
                    <div>
                        <label for="password-confirm" class="block text-sm font-medium text-gray-300">
                            {{ __('Konfirmasi Password') }}
                        </label>
                        <div class="mt-1">
                            <input
                                id="password-confirm"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                class="w-full p-3 rounded-md bg-gray-700 border border-gray-600 text-white focus:ring-sky-500 focus:border-sky-500"
                            >
                        </div>
                    </div>

                    {{-- Tombol Submit --}}
                    <div>
                        <button type="submit" class="w-full bg-sky-600 text-white py-3 px-4 rounded-md font-semibold hover:bg-sky-700 transition-colors duration-300">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection


<!-- UPPPPP -->
