<div class="card card-custom gutter-b" id="card_endereco">
    <div class="card-header border-0 py-5">
        <div class="card-title">
                <span class="card-icon">
                    <i class="fas fa-map-marker-alt text-primary"></i>
                </span>
            <h3 class="card-label">
                <span class="d-block text-dark font-weight-bolder">Endereços</span>
            </h3>
        </div>
        <div class="card-toolbar">
            <a href="{{route('web.pessoa-endereco.findViewCEP', ['pessoa' => $form->getModel()->id])}}"
               class="btn btn-light-primary font-weight-bolder font-size-sm">
                {{ Metronic::getSVG('media/svg/icons/Code/Plus.svg', 'svg-icon svg-icon-md ') }}
                Adicionar</a>
        </div>
    </div>
    <div class="card-body py-0">
        @if($form->getModel()->enderecos->count() == 0)
            <p class="text-center pb-10">
                Nenhum endereço cadastrado!
            </p>
        @else
            <div class="row d-flex align-items-stretch align-content-stretch">
                @foreach($form->getModel()->enderecos as $item)
                    <div class="col-sm-6 col-md-4 col-xxl-3 d-flex">
                        <div class="card bgi-no-repeat bgi-size-cover gutter-b w-100 bg-hover-light-primary">
                            <div
                                class="card-body d-flex flex-column justify-content-between text-center p-9 p-lg-3 p-xl-9">
                                <div class="d-flex flex-column">
                                    <h5 class="card-title font-weight-bolder text-primary mb-2">{{ $item->descricao}}</h5>
                                    <p class="mb-8 px-8 d-flex flex-column font-weight-bold text-dark-75 font-size-sm">
                                        <span>{{ $item->cep ? $item->cep : 'CEP não informado'}}</span>
                                    </p>
                                    <div class="mb-6">
                                        <span
                                            class="mb-0 d-flex flex-column text-secondary text-dark-50 font-weight-normal">
                                            {{$item->cidade->nome. " - " .$item->cidade->uf}}
                                        </span>
                                        <span
                                            class="mb-0 d-flex flex-column text-secondary text-dark-50 font-weight-normal">
                                            {{$item->bairro ? $item->bairro : 'Bairro não informado'}}
                                        </span>
                                        <span
                                            class="mb-0 d-flex flex-column text-secondary text-dark-50 font-weight-normal">
                                            {{$item->rua . ' ' .$item->numero}}
                                        </span>
                                    </div>
                                </div>
                                <form method='post'
                                      action='{{route('web.pessoa-endereco.destroy', ['pessoa' => $form->getModel()->id, 'pessoa_endereco' => $item->id])}}'
                                      onsubmit='return confirm("Tem certeza que deseja remover?")'>
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('web.pessoa-endereco.edit', ['pessoa' => $form->getModel()->id, 'pessoa_endereco' => $item->id])}}"
                                       class="btn btn-sm btn-light-primary font-weight-bold">Alterar</a>
                                    <button class='btn btn-text-danger btn-sm btn-light-danger font-weight-bold'>
                                        {{Metronic::getSVG('media/svg/icons/General/Trash.svg', 'svg-icon svg-icon-sm mr-0')}}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
