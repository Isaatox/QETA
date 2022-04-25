


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Yinka Enoch Adedokun">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

        <title>Login Page</title>
    </head>
    <body>
        <style>
            .main-content{
                width: 50%;
                border-radius: 20px;
                box-shadow: 0 5px 5px rgba(0,0,0,.4);
                margin: 5em auto;
                display: flex;
            }
            .company__info{
                background-color: #0d6efd;
                border-top-left-radius: 20px;
                border-bottom-left-radius: 20px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                color: #fff;
            }
            .fa-android{
                font-size:3em;
            }
            @media screen and (max-width: 640px) {
                .main-content{width: 90%;}
                .company__info{
                    display: none;
                }
                .login_form{
                    border-top-left-radius:20px;
                    border-bottom-left-radius:20px;
                }
            }
            @media screen and (min-width: 642px) and (max-width:800px){
                .main-content{width: 70%;}
            }
            .row > h2{
                color:#0d6efd;
            }
            .login_form{
                background-color: #fff;
                border-top-right-radius:20px;
                border-bottom-right-radius:20px;
                border-top:1px solid #ccc;
                border-right:1px solid #ccc;
            }
            form{
                padding: 0 2em;
            }
            .form__input{
                width: 100%;
                border:0px solid transparent;
                border-radius: 0;
                border-bottom: 1px solid #aaa;
                padding: 1em .5em .5em;
                padding-left: 2em;
                outline:none;
                margin:1.5em auto;
                transition: all .5s ease;
            }
            .form__input:focus{
                border-bottom-color: #0d6efd;
                box-shadow: 0 0 5px rgba(0,80,80,.4); 
                border-radius: 4px;
            }
            .btn1{
                transition: all .5s ease;
                width: 70%;
                border-radius: 30px;
                font-weight: 600;
                background-color: #0d6efd;
                border: 1px solid #0d6efd;
                margin-top: 1.5em;
                margin-bottom: 1em;
            }
        </style>
        <!-- Main Content -->

        <section >
            <x-guest-layout>
                <x-auth-card>
                    <x-slot name="logo">
                    </x-slot>
                    <div class="container-fluid">
                        <div class="row main-content bg-success text-center">
                            <div class="col-md-4 text-center company__info">
                                <span class="company__logo"><h2><i class="fas fa-robot"></i></h2></span>
                                <h4 class="company_title">Connexion panel admin</h4>
                                <a href="/" class="btn btn-warning mt-5"><i class="fas fa-sign-out-alt"></i><span> Retourner sur le site</span></a>

                            </div>
                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />
            
                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                                <div class="container-fluid">
                                    <div class="row">
                                        <form class="form-group" method="POST" action="{{ route('admin.login') }}">
                                            @csrf
                                            <div class="row">
            
                                                <x-label for="email" :value="__('Email')" />
            
                                                <input id="email" class="form__input" type="email" name="email" :value="old('email')" required autofocus />
            
                                            </div>
                                            <div class="row">
                                                <x-label for="password" :value="__('Mot de passe')" />
            
                                                <input id="password" class="form__input" type="password" name="password" required autocomplete="current-password" />
                                            </div>
                                            <div class="d-flex justify-content-center mx-4 mb-lg-4 ">
                                                <x-button class="btn1">
                                                    {{ __('Connexion') }}
                                                </x-button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-auth-card>
            </x-guest-layout>
        </section>
    </body>