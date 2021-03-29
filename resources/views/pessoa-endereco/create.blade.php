@extends('layout.app')

@section('content')
    <div class="card card-custom gutter-b">
        <div class="card-header border-0 py-5">
            <h3 class="card-title">
                <span class="card-label font-weight-bolder text-success">Novo endereço</span>
            </h3>
            <div class="card-toolbar">
                <a href="{{route('web.pessoa.edit', ['pessoa' => $pessoa->id])}}"
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
                        {!! form_widget($form->cep, ['value'=>request()->get('cep') ? request()->get('cep') : '']) !!}
                        <span class="form-text text-muted">Rua, logradouro, avenida, etc.</span>
                    </div>
                    <div class="form-group col-12 col-md-5">
                        {!! form_label($form->bairro) !!}
                        {!! form_widget($form->bairro) !!}
                        <span class="form-text text-muted">Bairro do endereço.</span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-5">
                        {!! form_label($form->rua) !!}
                        {!! form_widget($form->rua) !!}
                        <span class="form-text text-muted">Rua, logradouro, avenida, etc.</span>
                    </div>
                    <div id="cidade-group" class="form-group col-12 col-md-5">
                        {!! form_label($form->numero) !!}
                        {!! form_widget($form->numero) !!}
                        <span class="form-text text-muted">Número do endereço.</span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-5">
                        {!! form_label($form->cidade) !!}
                        {!! form_widget($form->cidade) !!}
                        <span class="form-text text-muted">Cidade do endereço.</span>
                    </div>
                    <div class="form-group col-12 col-md-5">
                        {!! form_label($form->descricao) !!}
                        {!! form_widget($form->descricao) !!}
                        <span
                            class="form-text text-muted">Descrição para o endereço (comercial, residencial, etc).</span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-10">
                        {!! form_label($form->complemento) !!}
                        {!! form_widget($form->complemento) !!}
                        <span class="form-text text-muted">Informações adicionais do endereço(locais próximos, características do local, etc).</span>
                    </div>
                </div>
                <div class="form-row mt-3">
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
        let cidadeSelect = $('#cidade');

        $(function () {
            cep.keyup(buscarCep).trigger('keyup');
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
            $('#cidade').val(data['ibge']).trigger('change')
        }

        function limparCampos() {
            $('.clear-on-cep-not-found').val('');
        }

        jQuery(document).ready(function () {
            @if(old('cidade'))
            $("#cidade").trigger("change");
            @endif
        });

    </script>
@endsection
