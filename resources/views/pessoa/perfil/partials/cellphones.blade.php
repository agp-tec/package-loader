<div class="card card-custom gutter-b" id="card_telefone">
    <div class="card-header border-0 py-5">
        <div class="card-title">
                <span class="card-icon">
                    <i class="fas fa-phone-alt text-primary"></i>
                </span>
            <h3 class="card-label">
                <span class="d-block text-dark font-weight-bolder">Telefones</span>
            </h3>
        </div>
        <div class="card-toolbar">
            <a href="{{ route('web.pessoa-telefone.create', ['pessoa' => $form->getModel()->id]) }}"
               class="btn btn-light-primary font-weight-bolder font-size-sm">
                {{ Metronic::getSVG('media/svg/icons/Code/Plus.svg', 'svg-icon svg-icon-md ') }}
                Adicionar</a>
        </div>
    </div>
    <div class="card-body py-0">
        @if($form->getModel()->telefones->count() == 0)
            <p class="text-center pb-10">
                Nenhum telefone cadastrado!
            </p>
        @else
            <div class="row">
                @foreach($form->getModel()->telefones()->orderByDesc('id')->get() as $item)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-6 col-xl-4 col-xxl-3 mb-5">
                        <div class="card mb-8 mb-lg-0">
                            @if($item->verificado == 1)
                                <div class="card-body p-0 bg-hover-light">
                                    <div class="d-flex justify-content-between align-items-center p-5 py-8">
                                        <div class="d-flex flex-column">
                                            {{ Metronic::getSVG('media/svg/icons/Navigation/Double-check.svg', 'svg-icon svg-icon-lg svg-icon-success pb-2') }}
                                            <span
                                                class="label label-inline label-lg font-weight-bold celular">{{$item->telefone}}</span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a class="btn btn-icon btn-light-primary btn-hover-primary btn-sm mb-2 disabled">
                                                {{ Metronic::getSVG('media/svg/icons/Design/Edit.svg', 'svg-icon svg-icon-sm svg-icon-primary') }}
                                            </a>
                                            <form method="post"
                                                  action='{{ route("web.pessoa-telefone.destroy", ["pessoa" => $form->getModel()->id, "pessoa_telefone" => $item->id])}}'
                                                  onsubmit='return confirm("Tem certeza que deseja remover?")'>
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-icon btn-light-danger btn-hover-danger btn-sm">
                                                    {{ Metronic::getSVG('media/svg/icons/General/Trash.svg', "svg-icon svg-icon-sm svg-icon-danger") }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="card-body p-0 bg-hover-light">
                                    <div class="d-flex justify-content-between align-items-center p-5 py-8">
                                        <div class="d-flex flex-column">
                                            {{ Metronic::getSVG('media/svg/icons/Home/Clock.svg', 'svg-icon svg-icon-lg svg-icon-warning pb-3') }}
                                            <span
                                                class="label label-inline label-lg font-weight-bold celular">{{$item->telefone}}</span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="{{route('web.pessoa-telefone.edit', ['pessoa' => $form->getModel()->id, 'pessoa_telefone' => $item->id])}}"
                                               class="btn btn-icon btn-light-primary btn-hover-primary btn-sm mb-2">
                                                {{ Metronic::getSVG('media/svg/icons/Design/Edit.svg', 'svg-icon svg-icon-sm svg-icon-primary') }}
                                            </a>
                                            <form method="post"
                                                  action='{{ route("web.pessoa-telefone.destroy", ["pessoa" => $form->getModel()->id, "pessoa_telefone" => $item->id])}}'
                                                  onsubmit='return confirm("Tem certeza que deseja remover?")'>
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-icon btn-light-danger btn-hover-danger btn-sm">
                                                    {{ Metronic::getSVG('media/svg/icons/General/Trash.svg', "svg-icon svg-icon-sm svg-icon-danger") }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@section('scripts')
    <script>

    </script>
@endsection
