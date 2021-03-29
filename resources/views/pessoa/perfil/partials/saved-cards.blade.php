<div class="card card-custom gutter-b" id="card_cartao">
    <div class="card-header border-0 py-5">
        <div class="card-title">
                <span class="card-icon">
                    {{Metronic::getSVG("media/svg/icons/Shopping/Credit-card.svg", "svg-icon-primary")}}
                </span>
            <h3 class="card-label">
                <span class="d-block text-dark font-weight-bolder">Cartões salvos</span>
            </h3>
        </div>
    </div>
    <div class="card-body py-0 mb-3">
        @if ($form->getModel()->perfilPagamentoList->count() == 0)
            <p class="text-center pb-10">Nenhum cartão cadastrado.</p>
        @else
            <div class="row">
                @foreach($form->getModel()->perfilPagamentoList as $item)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-6 col-xl-4 col-xxl-3 mb-5">
                        <div class="card mb-8 mb-lg-0">
                            <div class="card-body p-0 bg-hover-light">
                                <div class="d-flex justify-content-between align-items-center p-5 py-8">
                                    <div class="mr-6">
                                        <img class=""
                                             src="https://s3.amazonaws.com/recurrent/payment_companies/{{ strtolower($item->bandeira) }}.png"
                                             alt="Card image cap">
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="text-dark-75 font-weight-bold mb-1">{{ $item->titular }}</span>
                                        <span class="label label-inline label-light font-weight-bold">{{ $item->numero_inicial }}** **** {{ $item->numero_final }}</span>
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