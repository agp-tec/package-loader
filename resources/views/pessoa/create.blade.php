@extends('layout.app')

@section('title', 'Novo Cliente')

@section('content')
    <div class="card card-custom gutter-b">
        <div class="card-header border-0 py-5">
            <div class="card-title">
                <div class="card-icon">
                    <span>
                        <i class="fas fa-address-book text-primary"></i>
                    </span>
                </div>
                <h3 class="card-label">Novo Cliente</h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('web.pessoa.index')}}" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                    {{ Metronic::getSVG('media/svg/icons/Code/Error-circle.svg', "svg-icon svg-icon-md svg-icon-primary mr-0") }}
                </a>
            </div>
        </div>
        <div class="card-body py-0 d-flex">
            {!! form_start($form); !!}
            <div class="d-flex flex-column justify-content-center h-100">
                <div class="form-row flex-center">
                    <div class="form-group col-12 col-md-5">
                        {!! form_row($form->nome) !!}
                    </div>
                    <div class="form-group col-12 col-md-5">
                        {!! form_row($form->sobrenome) !!}
                    </div>
                    <div class="form-group col-12 col-md-5">
                        {!! form_row($form->nascimento) !!}
                    </div>
                    <div class="form-group col-12 col-md-5">
                        {!! form_row($form->email, ['value' => request()->get('email')]) !!}
                    </div>
                    <div class="form-group col-12 col-md-5">
                        {!! form_row($form->tipo_doc) !!}
                    </div>
                    <div class="form-group col-12 col-md-5">
                        {!! form_row($form->doc, ['value' => request()->get('doc')]) !!}
                    </div>
                </div>
                <div class="form-row text-right mt-3">
                    {!! form_widget($form->submit) !!}
                </div>
            </div>
            {!! form_end($form, false); !!}
        </div>
    </div>
@endsection

@section('scripts')

@endsection
