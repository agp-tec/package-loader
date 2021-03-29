@extends('layout.app')

@section('title', 'Login')

@section('styles')
    <link href="{{ asset('css/pages/login/classic/login-1.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="{{asset('js/pages/custom/login/login-general.js')}}"></script>
@endsection

@section('contentFull')
    <div class="d-flex flex-column flex-root">
        <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-row-fluid bg-white" id="kt_login">
            <div class="login-aside d-none d-xl-flex flex-row-auto bgi-size-cover bgi-no-repeat p-10 p-lg-10">
                <div class="d-flex flex-row-fluid flex-column justify-content-between">
                    <a href="#" class="flex-column-auto mt-5">
                        <img src="{{ asset('media/logos/AGP/logo-white-md.png') }}" class="max-h-50px" alt=""/>
                    </a>
                    <div class="flex-column-fluid d-flex flex-column justify-content-center">
                        <h3 class="font-size-h2 mb-0 text-white mb-3 mt-10">Bem-Vindo ao {{ config('app.name') }}</h3>
                        {{--<h2 class="display-1 text-white font-weight-lighter italic">APP</h2>--}}
                        <img width="50%" src="{{asset("media/APP/logos/png/logo-white-lg.png")}}" alt="Logo APP">
                        <p class="font-weight-lighter text-white opacity-80 mt-10">{{ config('app.desc') }}</p>
                    </div>
                    <div class="d-none flex-column-auto d-lg-flex justify-content-between mt-10">
                        <div class="opacity-70 font-weight-bold text-white">© 2020 AGP</div>
                        <div class="d-flex">
                            <a href="#" class="text-white">Privacidade</a>
                            <a href="#" class="text-white ml-10">Legal</a>
                            <a href="#" class="text-white ml-10">Contato</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-row-fluid d-flex flex-column position-relative p-7 overflow-hidden">
                @yield('content')
                <div class="d-flex d-lg-none flex-column-auto flex-column flex-sm-row justify-content-between align-items-center mt-5 p-5">
                    <div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">© 2020 AGP</div>
                    <div class="d-flex order-1 order-sm-2 my-2">
                        <a href="#" class="text-dark-75 text-hover-primary">Privacidade</a>
                        <a href="#" class="text-dark-75 text-hover-primary ml-4">Legal</a>
                        <a href="#" class="text-dark-75 text-hover-primary ml-4">Contato</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
