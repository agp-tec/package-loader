@extends('layout.app')

@section('title', 'Integração Google Authenticator')

@section('content')
    <div class="card card-custom gutter-b">
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-primary">Google Authenticator</span>
                <span class="text-muted mt-3 font-weight-bold font-size-sm">Aqui estão algumas ações da integração com o Google Authenticator.</span>
            </h3>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8">
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-xl-6">
                            <a href="{{ route('web.google-authenticator.create') }}">
                                <div class="card card-custom bg-primary gutter-b" style="height: 150px">
                                    <div class="card-body">
                                        {{ Metronic::getSVG('media/svg/icons/Code/Plus.svg', "svg-icon svg-icon-3x svg-icon-white ml-n2") }}
                                        <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">Gerar</div>
                                        <p class="text-inverse-primary font-weight-bold font-size-lg mt-1">Nova chave</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-6">
                            <a href="{{ route('web.google-authenticator.show', ['google_authenticator' => auth()->user()->getKey()]) }}">
                                <div class="card card-custom bg-warning gutter-b" style="height: 150px">
                                    <div class="card-body">
                                        {{ Metronic::getSVG('media/svg/icons/General/Search.svg', "svg-icon svg-icon-3x svg-icon-white ml-n2") }}
                                        <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">Consultar</div>
                                        <p class="text-inverse-primary font-weight-bold font-size-lg mt-1">Consultar minha chave </p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
