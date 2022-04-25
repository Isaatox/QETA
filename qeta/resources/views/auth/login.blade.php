@extends('layouts.main')

@section('content')
<style>
    .icon-background {
        color: #3abcc0;
        margin-top: -20%;
    }

    .icon {
        margin-top: -20%;
    }
</style>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100 mt-50">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-9 col-xl-7">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">

                        <x-guest-layout>
                            <x-auth-card>
                                <x-slot name="logo">
                                </x-slot>
                                <div class="row justify-content-center">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Se connecter</p>
                                    <span class="justify-content-center fa-stack fa-4x">
                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                        <i class="fas fa-fingerprint fa-stack-1x icon"></i>
                                    </span>
                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                    <div class="container mt-5">
                                        <form class="mx-1 mx-md-4" method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <!-- Email Address -->
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <div>

                                                        <x-label for="email" :value="__('Email')" />

                                                        <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Password -->
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <div class="mt-4">
                                                        <x-label for="password" :value="__('Mot de passe')" />

                                                        <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm">
                                                        <!-- Remember Me -->
                                                        <div class="form-outline flex-fill mb-0">
                                                            <div class="mt-4">
                                                                <div class="block mt-4">
                                                                    <label for="remember_me" class="inline-flex items-center">
                                                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                                                        <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir') }}</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm">
                                                    <div class="flex items-center justify-end mt-4">
                                                @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                    {{ __('Mot de passe oublié ?') }}
                                                </a>
                                                @endif
                                                    </div>
                                                </div>
                                            </div>




                                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4 mt-5">
                                                    <x-button class="ml-3 btn btn-primary">
                                                        {{ __('Connexion') }}
                                                    </x-button>
                                                </div>

                                        </form>

                                    </div>

                                    </form>
                                </div>
                            </x-auth-card>
                        </x-guest-layout>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
@endsection