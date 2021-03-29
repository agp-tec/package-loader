@extends('layout.login')

@section('title', 'Autenticar '.$user->nome)

@section('content')
    <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
        <div class="login-form login-signin">
            <div class="text-center mb-5 mb-lg-10">
                <img class="max-w-80px mt-n10 mt-xxl-n40" src="{{asset("media/APP/logos/png/logo3-blue-md.png")}}"
                     alt="Logo APP">
                <h3 class="font-size-h1 mt-8">Olá {{ $user->nome }}</h3>
                <p class="text-muted font-weight-bold">Informe sua senha para continuar</p>
            </div>
            {{ \Agp\Login\ViewComposer\LoginComposer::pass($user) }}
        </div>
    </div>
@endsection
