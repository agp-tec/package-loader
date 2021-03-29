@extends('layout.app')

@section('content')
    <div class="card card-custom gutter-b">
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-success">Editar endereço</span>
            </h3>

            <div class="card-toolbar">
                <a href="{{route('web.pessoa.edit', ['pessoa' => $form->getModel()->pessoa->id])}}"
                   class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                    <span
                        class="svg-icon svg-icon-md svg-icon-primary mr-0">{{ Metronic::getSVG('media/svg/icons/Code/Error-circle.svg') }}</span>
                </a>
            </div>
        </div>
        <div class="card-body py-0">
            {!! form_start($form); !!}
            <div class="flex-center">
                <div class="form-row">
                    <div class="form-group col-12 col-md-5">
                        {!! form_label($form->cep) !!}
                        {!! form_widget($form->cep) !!}
                    </div>
                    <div class="form-group col-12 col-md-5">
                        {!! form_label($form->bairro) !!}
                        {!! form_widget($form->bairro) !!}
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-5">
                        {!! form_label($form->rua) !!}
                        {!! form_widget($form->rua) !!}
                    </div>
                    <div id="cidade-group" class="form-group col-12 col-md-5">
                        {!! form_label($form->numero) !!}
                        {!! form_widget($form->numero) !!}
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-5">
                        {!! form_label($form->cidade) !!}
                        {!! form_widget($form->cidade) !!}
                    </div>
                    <div class="form-group col-12 col-md-5">
                        {!! form_label($form->descricao) !!}
                        {!! form_widget($form->descricao) !!}
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-10">
                        {!! form_label($form->complemento) !!}
                        {!! form_widget($form->complemento) !!}
                    </div>
                </div>
                <div class="form-row">
                    {!! form_row($form->submit) !!}
                </div>
            </div>
            {!! form_end($form, false); !!}

            {{-- OU
            {!! form($form) !!} --}}

        </div>
    </div>
@endsection

@section('scripts')
    <script>

        let cep = $('#cep');

        $(function () {
            cep.keyup(buscarCep);
        });

        function buscarCep() {
            if (cep.val() !== '')
                if (cep.val().includes('_') == false)
                    $.get("https://viacep.com.br/ws/" + cep.val() + "/json/")
                        .done(function (data) {
                            popularCampos(data)
                        })
        }

        function popularCampos(data) {
            $('#rua').val(data['logradouro'])
            $('#bairro').val(data['bairro'])
            $('#complemento').val(data['complemento'])
            $('#cidade').val(data['localidade'])
        }

        function limparCampos() {
            $('.clear-on-cep-not-found').val('');
        }


        jQuery(document).ready(function () {
            $("#cidade").trigger("change");
        });

    </script>
@endsection
