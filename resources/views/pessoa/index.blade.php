@extends('layout.app')

@section('title', 'Clientes')

@section('content')
    <div class="card card-custom gutter-b">
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-primary">Pessoas</span>
                <span class="text-muted mt-3 font-weight-bold font-size-sm">Aqui estão as pessoas cadastradas.</span>
            </h3>
            <div class="card-toolbar">
                <a href="{{route('web.pessoa.findView')}}" class="btn btn-primary font-weight-bolder font-size-sm">
                    <span
                        class="svg-icon svg-icon-md svg-icon-white">{{ Metronic::getSVG('media/svg/icons/Code/Plus.svg') }}</span>
                    Adicionar
                </a>
            </div>
        </div>

        <div class="card-body py-0">
            <form method="get">
                <div class="row d-flex justify-content-end">
                    <div class="col-3 d-flex flex-column justify-content-end mb-2">
                        <input class="form-control" type="text" name="genericSearch"
                               value="{{ (request()->genericSearch) }}" placeholder="Pesquisar...">
                    </div>
                </div>
            </form>
            {{ $report->build() }}
        </div>
    </div>

    {{ LogComposer::get('pag_cliente') }}

    <script>
        function copy(id) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(id).html()).select();
            document.execCommand("copy");
            $temp.remove();
        }
    </script>
@endsection
