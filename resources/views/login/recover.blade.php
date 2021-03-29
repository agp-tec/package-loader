@extends('layout.login')

@section('title', 'Alterar senha de '.$user->nome)

@section('content')
    <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
        <div class="login-form login-signin">
            <div class="text-center mb-5 mb-lg-10">
                <img class="max-w-80px mt-n10 mt-xxl-n40" src="{{asset("media/APP/logos/png/logo3-blue-md.png")}}"
                     alt="Logo AGPAG">
                <h3 class="font-size-h1 mt-8">Olá {{ $user->nome }}</h3>
                <p class="text-muted font-weight-bold">Escolha uma nova senha</p>
            </div>
            {{ \Agp\Login\ViewComposer\LoginComposer::recover($user) }}
        </div>
    </div>
@endsection
