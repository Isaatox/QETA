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
<section style="background-color: #eee;">
<br>
<br>
    <div class="container mt-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-9 col-xl-7">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-3">
                        <x-guest-layout>
                            <x-auth-card>
                                <x-slot name="logo">
                                </x-slot>
                                <div class="row justify-content-center">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Inscription</p>
                                    <span class="fa-stack fa-4x">
                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                        <i class="fas fa-lock fa-stack-1x icon"></i>
                                    </span>

                                        <!-- Validation Errors -->
                                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                        <div class="container mt-5">
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf

                                                <!-- Name -->
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-user-astronaut fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <div>
                                                            <x-label for="pseudo" :value="__('Pseudo')" />
                                                            <x-input id="pseudo" class="form-control" type="text" name="pseudo" :value="old('pseudo')" required autofocus />
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Email Address -->
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <div class="mt-4">
                                                            <x-label for="email" :value="__('Email')" />
                                                            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Password -->
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-user-lock fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <div>
                                                            <x-label for="password" :value="__('Password')" />
                                                            <x-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Confirm Password -->
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <div class="mt-4">
                                                            <x-label for="password_confirmation" :value="__('Confirm Password')" />
                                                            <x-input id="form3Example4cd" class="form-control" type="password" name="password_confirmation" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-check d-flex justify-content-center mb-5">
                                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                                                    <label class="form-check-label" for="form2Example3">
                                                        Accepter <a href="#!">les conditions d'utilisation</a>
                                                    </label>
                                                </div>
                                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                    <x-button class="btn btn-primary btn-lg ml-4">
                                                        {{ __('S\'enregistrer') }}
                                                    </x-button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="justify-content-center mt-4">
                                            <a class="btn btn-info" href="{{ route('login') }}">
                                                {{ __('Déjà enregistré ?') }}
                                            </a>
                                        </div>
                            </x-auth-card>
                        </x-guest-layout>
                    </div>
            </div>
        </div>
    </div>
    </div>
    <br>
    <br>

    
</section>
@endsection