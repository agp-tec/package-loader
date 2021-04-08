@extends('layout.app')

@section('title', 'Página inicial')

@section('content')
    <div class="row">
        <div class="col-xl-7 col-xxl-5">
            <div class="row">
                <div class="col-sm-6 order-first">
                    <div class="card card-custom card-stretch gutter-b">
                        <a href="{{ route('web.google-authenticator.index') }}">
                            <div class="card-body bg-hover-light rounded">
                                <i class="socicon-google icon-2x text-primary"></i>
                                <div class="text-dark-75 font-weight-bolder font-size-lg mt-3">Google</div>
                                <span class="font-weight-bold text-muted font-size-sm">Authentication</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 order-sm-1">
                    <div class="card card-custom bg-light-white card-stretch gutter-b">
                        <a href="#">
                            <div class="card-body">
                                <span class="text-dark-75 font-weight-bolder font-size-lg">Transações</span>
                                {{Metronic::getSVG("media/svg/icons/Shopping/Bag1.svg", "svg-icon svg-icon-2x svg-icon-primary float-right")}}
                                <span class="card-title font-weight-bolder text-dark-50 font-size-h3 mb-0 mt-6 d-block">0</span>
                                <span class="font-weight-bold text-muted font-size-sm">aguardando pagamento</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 order-first order-sm-2">
                    <div class="card card-custom card-stretch gutter-b">
                        <a href="#">
                            <div class="card-body bg-hover-light rounded">
                                {{Metronic::getSVG("media/svg/icons/General/Attachment2.svg", "svg-icon svg-icon-3x svg-icon-primary")}}
                                <div class="text-dark-75 font-weight-bolder font-size-lg mt-3">Meus Links</div>
                                <span class="font-weight-bold text-muted font-size-sm">0
                                    cadastrados</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 order-3">
                    <div class="card card-custom bg-light-white card-stretch gutter-b">
                        <a href="#">
                            <div class="card-body">
                                <span class="text-dark-75 font-weight-bolder font-size-lg">Assinaturas</span>
                                {{Metronic::getSVG("media/svg/icons/Shopping/ATM.svg", "svg-icon svg-icon-2x svg-icon-primary float-right")}}
                                <span class="card-title font-weight-bolder text-dark-50 font-size-h3 mb-0 mt-6 d-block">R$ 0</span>
                                <span class="font-weight-bold text-muted font-size-sm">em 0 ativas</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-xxl-7 order-first order-xl-last">
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-body d-flex p-0">
                    <div
                        class="flex-grow-1 p-13 card-rounded flex-grow-1 bgi-no-repeat d-xl-flex flex-column justify-content-center"
                        style="background-color: #ffffff;background-position: calc(100% + 0.3rem) 50%;background-size: 30% auto; /*background-image: url({{asset('media/svg/humans/custom-14.svg')}});*/">
                        <h2 class="text-primary pb-sm-5 font-weight-bolder">Olá, {{auth()->user()->nome}}!</h2>
                        <p class="d-none d-sm-block text-dark font-size-h5">Bem vindo ao <b>{{ config('app.name') }}</b> • {{ config('app.desc') }}</p>
                        <ul class="d-none d-sm-block list-unstyled">
                            <li>Configure as contas de processadoras para realizar vendas online.</li>
                            <li>Crie planos de assinaturas para seus clientes recorrentes.</li>
                            <li>Realize vendas pela internet.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex align-items-stretch align-content-stretch">
        <div class="col-md-4 d-flex">
            <div class="card card-custom bgi-no-repeat bgi-size-cover gutter-b w-100">
                <div class="card-body d-flex">
                    <div class="d-flex py-5 flex-column align-items-start flex-grow-1">
                        <div class="flex-grow-1 mb-2">
                            <a href="{{ route('web.pessoa.index') }}" class="text-dark font-weight-bolder font-size-h3">Clientes</a>
                            <p class="text-dark opacity-50 font-weight-bold mt-3">Veja a listagem de clientes. Adicione
                                novos e crie assinatua ou realize transações.</p>
                        </div>
                        <a href="{{ route('web.pessoa.index') }}" class="btn btn-link btn-link-dark font-weight-bold">Ver
                            mais
                            <span class="svg-icon svg-icon-lg svg-icon-white"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 d-flex">
            <div class="card card-custom bgi-no-repeat bgi-size-cover gutter-b w-100">
                <div class="card-body d-flex">
                    <div class="d-flex py-5 flex-column align-items-start flex-grow-1">
                        <div class="flex-grow-1">
                            <a href="#" class="text-dark font-weight-bolder font-size-h3">Assinaturas</a>
                            <p class="text-dark opacity-50 font-weight-bold mt-3">Confira as assinaturas ativas e se
                                estão ativas ou inadimplentes.</p>
                        </div>
                        <a href="#" class="btn btn-link btn-link-dark font-weight-bold">Ver mais
                            <span class="svg-icon svg-icon-lg svg-icon-white"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 d-flex">
            <div class="card card-custom bgi-no-repeat bgi-size-cover gutter-b w-100">
                <div class="card-body d-flex">
                    <div class="d-flex py-5 flex-column align-items-start flex-grow-1">
                        <div class="flex-grow-1">
                            <a href="#" class="text-dark font-weight-bolder font-size-h3">Transações</a>
                            <p class="text-dark opacity-50 font-weight-bold mt-3">Veja as últimas transações realizadas
                                e configura a situação de cada uma. Aqui também aparece as últimas assinaturas
                                cobradas.</p>
                        </div>
                        <a href="#" class="btn btn-link btn-link-dark font-weight-bold">Ver mais
                            <span class="svg-icon svg-icon-lg svg-icon-white"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
