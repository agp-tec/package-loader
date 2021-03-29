<div class="card card-custom gutter-b" id="card_cobranca">
    <div class="card-header border-0 py-5">
        <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon-price-tag text-primary"></i>
                </span>
            <h3 class="card-label">
                <span class="d-block text-dark font-weight-bolder">Cobranças</span>
            </h3>
        </div>
        <div class="card-toolbar">
            <a href="{{route('web.transacao.create', ["pessoaId" => $form->getModel()->id])}}"
               class="btn btn-light-primary font-weight-bolder font-size-sm">
                {{ Metronic::getSVG('media/svg/icons/Code/Plus.svg', 'svg-icon svg-icon-md ') }}
                Adicionar</a>
        </div>
    </div>
    <div class="card-body py-0">
        @if ($form->getModel()->transacoes->count() == 0)
            <p class="text-center pb-10">
                Nenhuma cobrança encontrada!
            </p>
        @else
            <div class="row d-flex align-items-stretch align-content-stretch">
                @foreach($form->getModel()->transacoes()->orderByDesc('id')->get() as $item)
                    <div class="col-sm-6 col-md-4 col-xxl-3 d-flex">
                        <div class="card bgi-no-repeat bgi-size-cover gutter-b w-100 bg-hover-light-primary">
                            <div
                                class="card-body d-flex flex-column justify-content-between text-center p-9 p-lg-3 p-xl-9">
                                <div class="d-flex flex-column">
                                    <h5 class="card-title font-weight-bolder text-primary mb-2">Transação
                                        #{{ $item->getKey() }} {{ $item->descricao }}</h5>
                                    <p class="mb-8 px-8 d-flex flex-column font-weight-bold text-dark-75 font-size-sm">
                                        <span>{{ date_create($item->updated_at)->format('d/m/y H:i') }}</span>
                                    </p>

                                    <div>
                                        @php
                                            $ultimaSituacao = $item->situacaoList()->orderBy('ocorrencia', 'desc')->orderBy('id', 'desc')->get()->first();
                                        @endphp

                                        @if($item->aprovado)
                                            <span
                                                class="label font-weight-bold label-lg label-light-success label-inline mb-2">Transação aprovada</span>
                                        @elseif(isset($ultimaSituacao) && ($ultimaSituacao->id == 7))
                                            <span
                                                class="label font-weight-bold label-lg label-light-danger label-inline mb-2">Transação reembolsada</span>
                                        @elseif(isset($ultimaSituacao) && ($ultimaSituacao->id == 8))
                                            <span
                                                class="label font-weight-bold label-lg label-light-warning label-inline mb-2">Transação estornada</span>
                                        @else
                                            <span
                                                class="label font-weight-bold label-lg label-light-danger label-inline mb-2">Transação não aprovada</span>
                                        @endif

                                        <span
                                            class="mb-3 d-flex flex-column text-secondary text-dark-50 font-weight-normal">
                                                @isset($ultimaSituacao)
                                                <p class="mb-0 font-size-sm">{{ $ultimaSituacao->nome }}</p>
                                            @else
                                                <p class="mb-0 font-size-sm">O detalhe da transação não foi encontrado.</p>
                                                <p class="mt-0 text-secondary">Tente atualizar a transação.</p>
                                            @endisset
                                            </span>

                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                        <span
                                            class="px-7 py-3 d-inline-flex flex-center rounded-lg mb-5 bg-primary-o-10">
                                            <span class="pr-2 opacity-70">R$</span>
                                            <span class="pr-2 font-size-h1 font-weight-bold">{{ $item->valor }}</span>
                                            <span class="pr-2 opacity-70"> em {{ $item->parcela }}x</span>
                                        </span>
                                    <div class="row mt-auto d-flex justify-content-center">
                                        <a class="btn btn-light-primary btn-sm font-weight-bold mr-2"
                                           href="{{ route('web.transacao.edit', ['transacao' => $item->getKey()]) }}">
                                            Ver mais
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
