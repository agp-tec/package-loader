<div class="d-flex flex-column flex-root">
    <div class="card card-custom overflow-hidden">
        <div class="card-body p-0">
            <div class="row justify-content-center bgi-size-cover bgi-no-repeat py-8 px-8 py-md-27 px-md-0"
                 style="background-image: url({{ asset('media/bg/bg-10.jpg') }});">
                <div class="col-md-9">
                    <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                        <h1 class="display-4 text-white font-weight-boldest mb-10">{{ $aplicativoPolitica->titulo }}</h1>
                        <div class="d-flex flex-column align-items-md-end px-0">
                            <a href="#" class="mb-2">
                                <img src="{{ config('app.url').'/imagens/'.$aplicativoPolitica->aplicativo['imagem'] }}"
                                     class="h-50px" alt=""/>
                            </a>
                            <span class="text-white d-flex flex-column align-items-md-end opacity-70">
							    <span>{{ $aplicativoPolitica->aplicativo['nome'] }}</span>
							    <span>{{ $aplicativoPolitica->aplicativo['url'] }}</span>
                            </span>
                        </div>
                    </div>
                    <div class="border-bottom w-100 opacity-20"></div>
                    <div class="d-flex justify-content-between text-white pt-6">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolde mb-2r">Criado em</span>
                            <span class="opacity-70">{{ $aplicativoPolitica->created_at }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Atualizado em</span>
                            <span class="opacity-70">{{ $aplicativoPolitica->updated_at }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Sessão</span>
                            <span
                                class="opacity-70">/{{ $aplicativoPolitica->sessao }}/{{ $aplicativoPolitica->titulo }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @if($showAceite)
                <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                    <div class="col-md-9">
                        <div class="d-flex justify-content-end">
                            <form method='post' action='{{ route("web.politica-aceite-usuario.store") }}'>
                                @csrf
                                @method('POST')
                                <input type="hidden" name="id" value="{{ $aplicativoPolitica->id }}">
                                <button class="btn btn-success font-weight-bold">
                                <span class="svg-icon svg-icon-md svg-icon-light">
                                    {{ Metronic::getSVG('media/svg/icons/Navigation/Sign-in.svg') }}
                                </span>
                                    Aceitar e continuar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                <div class="col-md-9">
                    {{ Markdown::parse($aplicativoPolitica->conteudo) }}
                </div>
            </div>
            @if($showAceite)
                <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between">
                            <a type="button" class="btn btn-light-danger font-weight-bold"
                               href="{{ route('web.login.logout') }}">
                                <span class="svg-icon svg-icon-md svg-icon-danger">
                                    {{ Metronic::getSVG('media/svg/icons/Navigation/Close.svg') }}
                                </span>
                                Recusar e sair
                            </a>
                            <form method='post' action='{{ route("web.politica-aceite-usuario.store") }}'>
                                @csrf
                                @method('POST')
                                <input type="hidden" name="id" value="{{ $aplicativoPolitica->id }}">
                                <button class="btn btn-success font-weight-bold">
                                    <span class="svg-icon svg-icon-md svg-icon-light">
                                        {{ Metronic::getSVG('media/svg/icons/Navigation/Sign-in.svg') }}
                                    </span>
                                    Aceitar e continuar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@include('layout.base._footer')
