@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="flex justify-center">
                <div class="w-full max-w-md">
                    <div class="bg-white shadow-md rounded-md overflow-hidden">
                        <div class="bg-primary px-4 py-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 mr-4">
                                    <img src="images/enkador-logo-white.png" alt="Logo" class="h-16 filter saturate-100 contrast-0 brightness-100 drop-shadow-md">
                                </div>
                                <div>
                                    <h2 class="text-white text-lg font-semibold">{{ config('app.name', 'XUDO') }}</h2>
                                    <p class="text-white">Inicie sesión para continuar</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-6">
                                    <label for="email" class="block text-gray-700 font-medium mb-2">Correo electrónico</label>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Ingrese correo" autocomplete="email" autofocus required
                                        class="block w-full px-4 py-3 rounded-md border focus:outline-none focus:border-blue-500 @error('email') border-red-500 @enderror">
                                    @error('email')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-6">
                                    <label for="password" class="block text-gray-700 font-medium mb-2">Contraseña</label>
                                    <input type="password" name="password" placeholder="Ingrese contraseña" autocomplete="current-password" required
                                        class="block w-full px-4 py-3 rounded-md border focus:outline-none focus:border-blue-500 @error('password') border-red-500 @enderror">
                                    @error('password')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-6 flex items-center">
                                    <input type="checkbox" name="remember" id="remember" class="rounded text-blue-500 focus:ring-blue-400 focus:ring-offset-blue-200">
                                    <label for="remember" class="ml-2 text-gray-700">Recuérdame</label>
                                </div>

                                <div class="mb-6">
                                    <button type="submit" class="w-full py-3 bg-blue-500 text-white font-semibold rounded-md focus:outline-none focus:bg-blue-600">
                                        Iniciar sesión
                                    </button>
                                </div>

                                <div class="text-center">
                                    <a href="{{ route('password.request') }}" class="text-gray-500 text-sm">¿Olvidó su contraseña?</a>
                                </div>
                            </form>
                        </div>
                        <div class="bg-gray-100 px-4 py-3">
                            <p class="text-sm text-center">© <script>document.write(new Date().getFullYear())</script> Enkador</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
