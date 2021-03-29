@extends('layout.app')

@section('content')
    <div class="card card-custom gutter-b">
        <div class="card-header border-0 py-5">
            <h3 class="card-title">
                <span class="card-label font-weight-bolder text-success">Novo telefone</span>
            </h3>
            <div class="card-toolbar">
                <a href="{{ route('web.pessoa.edit', ['pessoa' => $pessoa->id]) }}"
                   class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                    <span
                        class="svg-icon svg-icon-md svg-icon-primary mr-0">{{ Metronic::getSVG('media/svg/icons/Code/Error-circle.svg') }}</span>
                </a>
            </div>
        </div>
        <div class="card-body py-0">
            {!! form_start($form) !!}

            {!! form_row($form->ddd) !!}
            {!! form_row($form->numero) !!}

            <div class="form-row">
                <div class="form-group col-12">
                    {!! form_label($form->telefone) !!}
                    {!! form_widget($form->telefone) !!}
                </div>
                <div class="form-group col-12">
                    {!! form_label($form->descricao) !!}
                    {!! form_widget($form->descricao) !!}
                </div>
            </div>
            <div class="form-row">
                {!! form_row($form->submit) !!}
            </div>
            {!! form_end($form, false) !!}
        </div>
    </div>
@endsection
