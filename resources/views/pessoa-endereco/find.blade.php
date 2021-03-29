@extends('layout.app')

@section('title', 'Buscar Cliente')

@section('content')
    <div class="card card-custom gutter-b">
        <div class="d-flex justify-content-end mr-4 mt-5">
            <a href="{{route('web.pessoa.edit', ['pessoa' => $pessoa->id])}}"
               class="btn btn-default btn-light btn-hover-primary btn-sm mx-3">
                {{ Metronic::getSVG('media/svg/icons/Communication/Reply.svg', 'svg-icon svg-icon-md svg-icon-primary mr-0') }}
                Voltar
            </a>
        </div>
        <div class="flex-column-fluid d-flex flex-column p-10 rounded-lg mb-20">
            <div class="d-flex flex-row-fluid flex-center">
                <div class="cliente-form">
                    <form class="form" method="post"
                          action="{{ route('web.pessoa-endereco.findCEP', ['pessoa' => $pessoa->id]) }}">
                        @csrf
                        <div class="pb-5">
                            <div class="pb-5 pb-lg-10 mt-10">
                                <h3 class="font-weight-bolder text-dark font-size-h2 mb-1">Informe o <span
                                        class="display6">CEP</span> do seu endereço</h3>
                                <div class="text-muted font-weight-bold font-size-h6">
                                    Dessa forma podemos trazer todos os dados para você!
                                </div>
                            </div>
                            <div class="form-group d-flex flex-row-fluid flex-center m-0">
                                <input
                                    class="form-control h-auto py-3 px-8 rounded-lg font-weight-bold font-size-h4 cep"
                                    name="cep" id="input-cep" value="{{old('cep')}}">
                                <button type="submit"
                                        class="btn btn-primary font-weight-bolder font-size-h7 px-8 pr-md-13 pl-md-6 py-4 my-3 ml-2 border-0 rounded-lg d-flex flex-row-fluid"
                                        id="btn-find"><i class="flaticon2-search-1 icon-sm-md"></i>
                                    <span class="d-none d-md-flex">Buscar</span>
                                </button>
                            </div>
                            <a class="text-muted text-hover-primary font-weight-bold"
                               href="{{route('web.pessoa-endereco.create', ['pessoa' => $pessoa->id])}}">Não sei o meu
                                CEP</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
