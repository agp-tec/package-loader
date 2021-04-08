@extends('layout.app')

@section('title', 'Integração Google Authenticator')

@section('content')
    <div class="card card-custom gutter-b">
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-primary">Google Authenticator</span>
                <span class="text-muted mt-3 font-weight-bold font-size-sm">Aqui estão algumas ações da integração com o Google Authenticator.</span>
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                @if($googleAuthenticator->verificado === 0)
                    <div class="col-xl-4 pb-5">
                        <img src="{{ (new \chillerlan\QRCode\QRCode)->render($googleAuthenticator->secret_key) }}" alt="">
                    </div>
                    <div class="col-xl-6">
                        <p class="font-weight-bolder pt-15 px-20">Para ativar e validar o qrcode você precisa escanear em seu aplicativo Google Authenticator e digitar o código a baixo!</p>
                        <form action="{{ route('web.google-authenticator.verify') }}" method="post">
                            @csrf
                            <div class="form-group p-8 px-20">
                                <label>Digite o código do google authenticar</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Digito o código" name="secret" autocomplete="off">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                                    <div class="card-body">
                                        {{ Metronic::getSVG("media/svg/icons/General/Lock.svg", "svg-icon-white svg-icon-3x ml-n1") }}
                                        <div class="text-inverse-success font-weight-bolder font-size-h5 mb-2 mt-5">Ativado e Verificado</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-3">
                                <div class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b" data-toggle="modal" data-target="#modalTeste">
                                    <div class="card-body">
                                        {{ Metronic::getSVG("media/svg/icons/Communication/Clipboard-check.svg", "svg-icon-white svg-icon-3x ml-n1") }}
                                        <div class="text-inverse-success font-weight-bolder font-size-h5 mb-2 mt-5">Efetuar Teste</div>
                                    </div>
                                </div>
                                <!-- Modal-->
                                <div class="modal fade" id="modalTeste" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Testar Código</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('web.google-authenticator.verify') }}" method="post">
                                                    @csrf
                                                    <div class="form-group py-10 px-20">
                                                        <label>Digite o código do google authenticar</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="Digito o código" name="secret" autocomplete="off">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-primary" type="submit">Enviar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <a href="javascript:;" data-toggle="modal" data-target="#modalDesativar">
                                    <div class="card card-custom bg-danger bg-hover-state-danger gutter-b" style="height: 150px">
                                        <div class="card-body">
                                            {{ Metronic::getSVG('media/svg/icons/Navigation/Close.svg', "svg-icon svg-icon-3x svg-icon-white ml-n2") }}
                                            <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">Desativar</div>
                                        </div>
                                    </div>
                                </a>
                                <div class="modal fade" id="modalDesativar" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Desativar</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('web.google-authenticator.verify') }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <div class="form-group py-10 px-20">
                                                        <label>Digite o código do google authenticar</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="Digito o código" name="secret" autocomplete="off">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-danger" type="submit">Enviar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
