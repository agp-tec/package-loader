<div>
    {{-- Heading --}}
    <div class="row d-flex">
        <div class="col-8">
            <h5 class="mb-5">
                Últimos acessos
            </h5>
        </div>
        <div class="col-4 d-flex justify-content-end">
            <a href="{{ route('web.logout.all') }}" class="navi-item">
                <div class="text-muted">
                    Sair de todos
                </div>
            </a>
        </div>
    </div>

    <div class="navi navi-spacer-x-0 p-0">
        @if($list != null)
            @foreach($list as $item)
                @if($loop->index >= 10)
                    @break
                @endif
                <a href="#" class="navi-item">
                    <div class="navi-link">
                        <div class="symbol symbol-40 bg-light mr-3">
                            <div class="symbol-label">
                                {{ Metronic::getSVG("media/svg/icons/Communication/Shield-user.svg", "svg-icon-md svg-icon-primary") }}
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold">
                                Login as {{ date_create($item->acesso)->format('H:i d/m') }}
                                ({{ Agp\BaseUtils\Helper\Utils::getTimeElapsed($item->acesso,false) }})
                            </div>
                            <div class="text-muted">
                                IP {{ $item->ip }}
                                @if($item->regiao)
                                    em {{ $item->regiao }}
                                @endif
                            </div>
                            <div class="text-muted">
                                {{ $item->os }} {{ $item->browser }}
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        @endif
    </div>
</div>
