@php
    $direction = config('layout.extras.user.offcanvas.direction', 'right');
@endphp
{{-- User Panel --}}
<div id="kt_quick_user" class="offcanvas offcanvas-{{ $direction }} p-10">
    {{-- Header --}}
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <h3 class="font-weight-bold m-0">
            Perfil do usuário
            {{--			<small class="text-muted font-size-sm ml-2">12 messages</small>--}}
        </h3>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>

    {{-- Content --}}
    <div class="offcanvas-content pr-5 mr-n5">
        {{-- Header --}}
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                <div class="symbol-label"
                     style="background-image:url('{{ auth()->user()->getImagemLink() }}')"></div>
                {{--<i class="symbol-badge bg-success"></i>--}}
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
                    {{ auth()->user()->nome }} {{ auth()->user()->sobrenome }}
                </a>
                <div class="text-muted mt-1">
                    {{ \Agp\BaseUtils\Helper\Utils::getIpRequest() }}
                </div>
                <div class="navi mt-0">
                    <a href="#" class="navi-item">
                        <span class="navi-link p-0 pb-3">
                            {{--<span class="navi-icon mr-1">
								{{ Metronic::getSVG("media/svg/icons/Communication/Mail-notification.svg", "svg-icon-lg svg-icon-primary") }}
							</span>--}}
                            <span class="navi-text text-muted text-hover-primary">{{ auth()->user()->email }}</span>
                        </span>
                    </a>
                    <a href="#" class="btn btn-sm btn-light-success font-weight-bolder mt-3 py-2 px-5">Meu Perfil</a>
                    @foreach(Auth::user()->getContas() as $conta)
                        @if((Auth::user()->getAdmEmpresaId() == $conta->empresaId) && (Auth::user()->email == $conta->email))
                            <a href="{{ route('web.login.logout', ['contaId' => $conta->contaId]) }}"
                               class="btn btn-sm btn-light-primary font-weight-bolder mt-3 py-2 px-5">Sair</a>
                            @break
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Separator --}}
        <div class="separator separator-dashed mt-8 mb-5"></div>

        {{-- Nav --}}
        <div class="navi navi-spacer-x-0 p-0">
            {{-- Item --}}
            @foreach(Auth::user()->getContas() as $conta)
                @if(!((Auth::user()->getAdmEmpresaId() == $conta->empresaId) && (Auth::user()->email == $conta->email)))
                    <a href="{{ route('web.home', ['contaId' => $conta->contaId]) }}" class="navi-item">
                        <div class="navi-link">
                            @if($conta->conectado ?? true)
                                <div class="symbol symbol-40 bg-light mr-3">
                                    <div class="symbol-label">
                                        {{ Metronic::getSVG("media/svg/icons/Communication/Forward.svg", "svg-icon-md svg-icon-success") }}
                                    </div>
                                </div>
                                <div class="navi-text">
                                    <div class="font-weight-bold">
                                        {{ $conta->empresa ?? '' }}
                                    </div>
                                    <div class="text-muted">
                                        Acessar como {{ $conta->email }}
                                    </div>
                                </div>
                            @else
                                <div class="symbol symbol-40 bg-light mr-3">
                                    <div class="symbol-label">
                                        {{ Metronic::getSVG("media/svg/icons/Communication/Forward.svg", "svg-icon-md svg-icon-danger") }}
                                    </div>
                                </div>
                                <div class="navi-text">
                                    <div class="font-weight-bold danger">
                                        {{$conta->empresa}} Desconectado
                                    </div>
                                    <div class="text-muted">
                                        Acessar como {{ $conta->email }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </a>
                @endif
            @endforeach
            {{-- Item --}}
            <a href="{{ route("web.login.index") }}" class="navi-item">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            {{ Metronic::getSVG("media/svg/icons/Communication/Add-user.svg", "svg-icon-md svg-icon-warning") }}
                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">
                            Adicionar outra conta
                        </div>
                        <div class="text-muted">
                            Login com usuário ou empresa diferente
                        </div>
                    </div>
                </div>
            </a>
        </div>

        {{-- Separator --}}
        <div class="separator separator-dashed my-7"></div>

        {{-- Ultimos acessos --}}
        {{ UsuarioComposer::getAtividadeRecente() }}

    </div>
</div>
