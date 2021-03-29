@extends('layout.app')

@section('content')
    <div class="card card-custom gutter-b">
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">Configurações</span>
                <span class="text-muted mt-3 font-weight-bold font-size-sm">Configure aqui as preferências da sua conta.</span>
            </h3>
            <div class="card-toolbar">
                <a href="{{route('web.home')}}" class="btn btn-default btn-light btn-hover-primary btn-sm mx-3">
                    {{ Metronic::getSVG('media/svg/icons/Communication/Reply.svg', 'svg-icon svg-icon-md svg-icon-primary mr-0') }}
                    Voltar
                </a>
            </div>
        </div>
        <div class="card-body py-0">
            <div class="row d-flex align-items-stretch align-content-stretch mb-10">
                <div>
                    <a href="#Webhooks"
                       class="btn btn-light-primary font-weight-bolder font-size-sm">
                        <i class="flaticon2-rocket text-primary"></i>
                        Webhooks</a>
                    <span class="text-muted mt-1 font-weight-bold font-size-sm">Avise a outros sistemas que determinada ação ocorreu aqui em {{ config('app.name') }}.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-custom gutter-b" id="Webhooks">
        <div class="card-header border-0 py-5">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-rocket text-primary"></i>
                </span>
                <h3 class="card-label">Webhooks</h3>
                <span class="text-muted mt-1 font-weight-bold font-size-sm">Aqui estão as integrações de {{ config('app.name') }} com outros sistemas</span>
            </div>
            <div class="card-toolbar">
                <a href="{{route('web.webhook.create')}}"
                   class="btn btn-light-primary font-weight-bolder font-size-sm">
                    {{ Metronic::getSVG('media/svg/icons/Code/Plus.svg', 'svg-icon svg-icon-md ') }}
                    Adicionar webhook</a>
            </div>
        </div>
        <div class="card-body py-0">
            <div class="row d-flex align-items-stretch align-content-stretch">
                @if ($webhooks->count() == 0)
                    <p class="card-text text-right mb-10">Nenhum webhook configurado.</p>
                @else
                    @foreach($webhooks as $item)
                        <div class="col-md-3 col-xxl-3 d-flex">
                            <div class="card bgi-no-repeat bgi-size-cover gutter-b w-100 bg-hover-light">
                                <div class="card-body d-flex flex-column justify-content-between text-center">
                                    <div class="d-flex flex-column">
                                        <h5 class="card-title font-weight-bolder mb-3">{{ $item->url }}</h5>
                                        <p class="mb-10 px-8 d-flex flex-column text-dark-50">
                                            <span>{{ ($item->situacao=='1'?'Ativo':'Inativo') }}</span>
                                        </p>
                                    </div>
                                    <div class="d-flex flex-column">
                                        @if($item->webhookEventos)
                                            @foreach($item->webhookEventos as $evento)
                                                <div
                                                    class="rounded-lg bg-primary-o-10 w-100 mb-2 text-dark-50 text-secondary overflow-hidden text-truncate text-nowrap">
                                                    <span>{{ $evento->evento }}</span>
                                                </div>
                                            @endforeach
                                        @else
                                            <div
                                                class="rounded-lg bg-primary-o-10 w-100 mb-8 text-dark-50 text-secondary overflow-hidden text-truncate text-nowrap">
                                                <span>Nenhum evento configurado.</span>
                                            </div>
                                        @endif
                                        <div class="row mt-auto d-flex justify-content-center">
                                            <a class='btn btn-light-primary btn-sm font-weight-bold mr-2'
                                               href='{{route("web.webhook.edit", ["webhook" => $item->id])}}'>Alterar</a>
                                            <a class='btn btn-light-primary btn-sm font-weight-bold mr-2'
                                               href='{{route("web.webhook.teste", ["webhook" => $item->id])}}'>Testar</a>
                                            <form method='post'
                                                  action='{{route("web.webhook.destroy", ["webhook" => $item->id])}}'
                                                  onsubmit='return confirm("Tem certeza que deseja remover?")'>
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class='btn btn-text-danger btn-sm btn-light-danger font-weight-bold'>
                                                    {{Metronic::getSVG('media/svg/icons/General/Trash.svg', 'svg-icon svg-icon-sm mr-0')}}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
