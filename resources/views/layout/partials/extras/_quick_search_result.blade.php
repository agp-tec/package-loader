<div class="quick-search-result">
    @if(count($list)==0)
        {{-- Message --}}
        <div class="text-muted">
            Nenhum resultado encontrado
        </div>
    @else
        @foreach($list as $session)
            {{-- Section --}}
            <div class="font-size-sm text-primary font-weight-bolder text-uppercase mb-2">
                {{ $session['title'] }}
            </div>

            <div class="mb-10">
            @foreach($session['result'] as $result)

                    <div class="d-flex align-items-center flex-grow-1 mb-2">
                        <div class="symbol symbol-30 bg-transparent flex-shrink-0">
                            @if($result['icon'])
                                <span class="{{ $result['img_class'] }}">{{ Metronic::getSVG($result['img']) }}</span>
                            @else
                                @isset($result['img'])
                                    <img src="{{ $result['img'] }}" alt=""/>
                                @else
                                    <i class="flaticon-exclamation-1 text-warning"></i>
                                @endif
                            @endif
                        </div>
                        <div class="d-flex flex-column ml-3 mt-2">
                            <a href="{{ route($result['route'],$result['route_params']) }}" class="font-weight-bold text-dark text-hover-primary">
                                {{ $result['title'] }}
                            </a>
                            <span class="font-size-sm font-weight-bold text-muted">
                            {{ $result['subtitle'] }}
                            </span>
                        </div>
                    </div>
            @endforeach
            </div>
        @endforeach
    @endif
</div>
