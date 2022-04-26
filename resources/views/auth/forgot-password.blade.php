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
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-9 col-xl-7">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-3">
                        <div class="row justify-content-center">

                            <x-guest-layout>
                                <x-auth-card>
                                    <x-slot name="logo">
                                    </x-slot>

                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">{{ __('Mot de passe oublié ?') }}</p>

                                        <span class="fa-stack fa-4x">
                                            <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                            <i class="fas fa-lock fa-stack-1x icon"></i>
                                        </span>
                                        <!-- Email Address -->
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <x-label for="email" :value="__('Email')" />
                                                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                                            </div>
                                        </div>
                                        <div>

                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            <x-button class="btn btn-primary btn-lg">
                                                {{ __('Réinitialiser votre mot de passe') }}
                                            </x-button>
                                        </div>
                                    </form>
                                </x-auth-card>
                            </x-guest-layout>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection