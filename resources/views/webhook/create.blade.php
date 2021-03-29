@extends('layout.app')

@section('content')
    <div class="card card-custom gutter-b">
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">Novo webhook</span>
            </h3>
            <div class="card-toolbar">
                <a href="{{route('web.settings')}}"
                   class="btn btn-default btn-light btn-hover-primary btn-sm mx-3">
                    {{ Metronic::getSVG('media/svg/icons/Communication/Reply.svg', 'svg-icon svg-icon-md svg-icon-primary mr-0') }}
                    Voltar
                </a>
            </div>
        </div>
        <div class="card-body py-0">
            {!! form_start($form); !!}
{{--            <input type="hidden" name="empresa" value="{{ $form->getModel()->adm_empresa_id }}">--}}
{{--            <input type="hidden" name="empresa" value="{{ $form->getModel()->adm_aplicativo_id }}">--}}
            <div class="form-row">
                <div class="form-group">
                    <span class="card-label font-weight-bolder text-dark-75">Url</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-sm">
                        URL que irá receber o disparo de eventos.
                        {!! form_row($form->url) !!}
                    </span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <span class="card-label font-weight-bolder text-dark-75">Situacao</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-sm">
                        Indica se o webhook está ativo ou inativo.
                    </span>
                    <span class="switch switch-lg switch-icon">
                        <label>
                            {!! form_widget($form->situacao) !!}
                            <span></span>
                        </label>
                    </span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <span class="card-label font-weight-bolder text-dark-75">Eventos</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-sm">
                        Nome dos eventos que irão disparar este webhook.
                    </span>
                    <button type="button" class='btn btn-text-danger btn-sm btn-light-success font-weight-bold' onclick="addForm()">
                        {{ Metronic::getSVG('media/svg/icons/Code/Plus.svg', 'svg-icon svg-icon-sm mr-0') }}
                    </button>
                    <div id="formItens">
                        @php
                            $webhookEventos = old('webhookEventos', []);
                            $inc = 0;
                        @endphp
                        @foreach($webhookEventos as $item)
                            @foreach($item as $key => $value)
                                <input class="form-control" name="webhookEventos[{{ $inc++ }}][evento]" type="text" placeholder="Informe o nome do evento" value="{{ $value }}">
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-row">
                {!! form_row($form->submit) !!}
            </div>
            {!! form_end($form, false); !!}

            {{-- OU
            {!! form($form) !!} --}}

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function addForm() {
            var el = $('#formItens');
            var c = el.children().length;
            el.append('<input class="form-control" name="webhookEventos['+c+'][evento]" type="text" placeholder="Informe o nome do evento">');
        }
    </script>
@endsection
