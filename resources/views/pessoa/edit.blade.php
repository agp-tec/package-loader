@extends('layout.app')

@section('title', 'Alterar Cliente')

@section('content')
    <div class="row d-flex align-items-stretch align-content-stretch">
        @include('pessoa.perfil.partials.imagem.image')
        <div class="col-12 col-md-7 col-lg-8 d-flex">
            <div class="card card-custom gutter-b">
                <div class="card-header border-0 py-5">
                    <div class="card-title">
                        <div class="card-icon">
                            <span>
                                <i class="flaticon-edit-1 text-primary"></i>
                            </span>
                        </div>
                        <h3 class="card-label">Editar {{$form->getModel()->nome." ".$form->getModel()->sobrenome}}</h3>
                    </div>
                    <div class="d-none d-md-flex card-toolbar">
                        <a href="{{route('web.pessoa.index') }}"
                           class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                            {{ Metronic::getSVG('media/svg/icons/Code/Error-circle.svg', "svg-icon svg-icon-md svg-icon-primary mr-0") }}
                        </a>
                    </div>
                </div>
                <div class="card-body py-0 d-flex">
                    {!! form_start($form); !!}
                    <div class="d-flex flex-column justify-content-between h-100">
                        <div class="form-row">
                            <ul class="nav nav-tabs w-100" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home">
                                            <span class="nav-icon">
                                                {{ Metronic::getSVG('media/svg/icons/General/Clipboard.svg', 'svg-icon svg-icon-md svg-icon-primary') }}
                                            </span>
                                        <span class="nav-text">Dados</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="others-tab" data-toggle="tab" href="#others"
                                       aria-controls="others">
                                            <span class="nav-icon">
                                                {{ Metronic::getSVG('media/svg/icons/Navigation/Plus.svg', 'svg-icon svg-icon-md svg-icon-primary') }}
                                            </span>
                                        <span class="nav-text">Outros</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content mt-5 w-100" id="myTabContent">
                                <div class="tab-pane fade active show" id="home" role="tabpanel"
                                     aria-labelledby="home-tab">
                                    <div class="form-row">
                                        <div class="form-group col-12 col-lg-5">
                                            {!! form_row($form->nome) !!}
                                        </div>
                                        <div class="form-group col-12 col-lg-5">
                                            {!! form_row($form->sobrenome) !!}
                                        </div>
                                        <div class="form-group col-12 col-lg-5">
                                            {!! form_row($form->nascimento) !!}
                                        </div>
                                        <div class="form-group col-12 col-lg-5">
                                            {!! form_row($form->email) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="others" role="tabpanel" aria-labelledby="others-tab">
                                    <div class="form-row">
                                        <div class="form-group col-12 col-lg-6">
                                            {!! form_row($form->tipo_doc) !!}
                                        </div>
                                        <div class="form-group col-12 col-lg-6">
                                            {!! form_row($form->doc) !!}
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            {!! form_row($form->idioma) !!}
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            {!! form_row($form->fuso) !!}
                                        </div>
                                        <div class="form-group col-5 col-md-10">
                                            {!! form_row($form->sexo) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="form-row text-right mt-3">
                                {!! form_widget($form->submit) !!}
                            </div>
                        </div>
                    </div>
                    {!! form_end($form, false); !!}
                </div>
            </div>
        </div>
    </div>
    @include('pessoa.perfil.partials.adress')
    @include('pessoa.perfil.partials.cellphones')
    @include('pessoa.perfil.partials.signatures')
    @include('pessoa.perfil.partials.charges')
    @include('pessoa.perfil.partials.saved-cards')

@endsection
