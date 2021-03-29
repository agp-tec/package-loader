<div class="card card-custom gutter-b" id="card_assinatura">
    <div class="card-header border-0 py-5">
        <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon-price-tag text-primary"></i>
                </span>
            <h3 class="card-label">
                <span class="d-block text-dark font-weight-bolder">Assinaturas</span>
            </h3>
        </div>
        <div class="card-toolbar">
            <a href="{{route('web.assinatura.create', ["pessoaId" => $form->getModel()->id])}}"
               class="btn btn-light-primary font-weight-bolder font-size-sm">
                {{ Metronic::getSVG('media/svg/icons/Code/Plus.svg', 'svg-icon svg-icon-md ') }}
                Adicionar</a>
        </div>
    </div>
    <div class="card-body py-0">
        @if ($form->getModel()->assinaturas->count() == 0)
            <p class="text-center pb-10">
                Nenhuma assinatura encontrada!
            </p>
        @else
            <div class="row d-flex align-items-stretch align-content-stretch">
                @foreach($form->getModel()->assinaturas as $item)
                    <div class="col-sm-6 col-md-4 col-xxl-3 d-flex">
                        <div class="card bgi-no-repeat bgi-size-cover gutter-b w-100 bg-hover-light-primary">
                            <div
                                class="card-body d-flex flex-column justify-content-between text-center p-9 p-lg-3 p-xl-9">
                                <div class="d-flex flex-column">
                                    <h5 class="card-title font-weight-bolder mb-3 text-primary">{{ $item->descricao }}</h5>
                                    <p class="mb-4 px-8 d-flex flex-column font-weight-bold text-dark-75">
                                        <span>{{ $item->plano->nome }}</span>
                                    </p>
                                    @php
                                        $situacao = $item->situacao();
                                    @endphp
                                    <div>
                                        @switch($situacao->descricao)
                                            @case('Adimplente')
                                            <span
                                                class="label font-weight-bold label-lg label-light-success label-inline mb-2 mx-5">{{ $situacao->descricao }}</span>
                                            <span class="mb-4 px-8 d-flex flex-column text-secondary text-success">
                                                    De {{ date_create($situacao->inicio)->format('d/m/y H:i') }} até {{ date_create($situacao->termino)->format('d/m/y H:i') }}
                                                </span>
                                            @break
                                            @default
                                            {{--                                                <span class="label font-weight-bold label-lg label-light-danger label-inline mb-2 mx-5">{{ $situacao->situacao }}</span>--}}
                                            <span
                                                class="label font-weight-bold label-lg label-light-success label-inline mb-2 mx-5">{{ $situacao->descricao }}</span>
                                            <span class="mb-4 px-8 d-flex flex-column text-secondary text-success">
                                                    De {{ date_create($situacao->inicio)->format('d/m/y H:i') }} até {{ date_create($situacao->termino)->format('d/m/y H:i') }}
                                                </span>
                                            @break
                                        @endswitch
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    @if($item->valor > 0)
                                        <span
                                            class="px-7 py-3 d-inline-flex flex-center rounded-lg mb-5 bg-primary-o-10">
                                                <span class="pr-2 opacity-70">R$</span>
                                                <span
                                                    class="pr-2 font-size-h1 font-weight-bold">{{ $item->valor }}</span>
                                            </span>
                                        <span class="card-subtitle mb-10 px-5 text-muted">
                                           @if($item->periodo == '1')
                                                @if($item->intervalo <= 1)
                                                    a cada dia
                                                @else
                                                    a cada {{ $item->aplicativoPlano->intervalo }} dias
                                                @endif
                                            @else
                                                @if($item->intervalo <= 1)
                                                    a cada mes
                                                @else
                                                    a cada {{ $item->aplicativoPlano->intervalo }} meses
                                                @endif
                                            @endif
                                        </span>
                                    @else
                                        <span
                                            class="px-7 py-3 font-size-h1 font-weight-bold d-inline-flex flex-center bg-primary-o-10 rounded-lg mb-17">Free</span>
                                    @endif

                                    <div class="row mt-auto d-flex justify-content-center">
                                        <a class="btn btn-light-primary btn-sm font-weight-bold mr-2"
                                           href="{{ route('web.assinatura.edit', ['assinatura' => $item->getKey()]) }}">
                                            Alterar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
