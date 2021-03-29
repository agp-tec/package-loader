<div class="d-flex align-items-center">
    <div class="symbol symbol-45 mr-3">
        <div class="symbol-label"
             style="background-image:url('{{ $pessoa->getImagemLink(64) }}')"></div>
        {{--<i class="symbol-badge bg-success"></i>--}}
    </div>
    <div class="d-flex flex-column">
        <span class="font-weight-bolder font-size-h6 text-dark-75">
            {{ $pessoa->nome }} {{ $pessoa->sobrenome }}
        </span>
        <div class="navi mt-0">
            <div class="navi-item">
                <p class="p-0">
                    {{ Metronic::getSVG("media/svg/icons/Communication/Mail.svg", "svg-icon-sm svg-icon-primary mr-1") }}
                    <span class="text-dark-65 font-size-xs">
                        {{ $pessoa->email }}
                    </span>
                </p>
            </div>
        </div>
        <div class="navi mt-n4">
            <div class="navi-item">
                <p class="p-0 mb-0">
                    {{ Metronic::getSVG("media/svg/icons/Shopping/Wallet3.svg", "svg-icon-sm svg-icon-primary mr-1") }}
                    <span class="text-dark-65 font-size-xs">
                        {{ $pessoa->doc }}
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>
