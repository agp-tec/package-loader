{{-- Sticky Toolbar --}}
<ul class="d-none d-lg-flex sticky-toolbar nav flex-column pl-2 pr-2 pt-3 pb-3 mt-4">
    {{-- Item --}}
    <li class="nav-item mb-2" id="kt_demo_panel_toggle" data-toggle="tooltip" title="Nova assinatura"
        data-placement="right">
        <a class="btn btn-sm btn-icon btn-bg-light btn-text-success btn-hover-success"
           {{--           data-toggle="modal" data-target="#dtm_pessoassinatura"--}}
           href="#">
            <span
                class="svg-icon svg-icon-md svg-icon-success">{{ Metronic::getSVG('media/svg/icons/Shopping/ATM.svg') }}</span>
        </a>
    </li>

    {{-- Item --}}
    <li class="nav-item mb-2" data-toggle="tooltip" title="Nova cobrança" data-placement="left">
        <a class="btn btn-sm btn-icon btn-bg-light btn-text-primary btn-hover-primary"
           href="#">
            <span
                class="svg-icon svg-icon-md svg-icon-primary">{{ Metronic::getSVG('media/svg/icons/Shopping/Bag1.svg') }}</span>
        </a>
    </li>

    {{-- Item --}}
    <li class="nav-item mb-2" data-toggle="tooltip" title="Links de pagamento" data-placement="left">
        <a class="btn btn-sm btn-icon btn-bg-light btn-text-warning btn-hover-warning"
           href="#">
            <i class="flaticon2-telegram-logo text-warning"></i>
        </a>
    </li>


    @if (config('layout.extras.chat.display') == true)
        {{-- Item --}}
        <li class="nav-item" id="kt_sticky_toolbar_chat_toggler" data-toggle="tooltip" title="Chat Example"
            data-placement="left">
            <a class="btn btn-sm btn-icon btn-bg-light btn-text-danger btn-hover-danger" href="#" data-toggle="modal"
               data-target="#kt_chat_modal">
                <i class="flaticon2-chat-1"></i>
            </a>
        </li>
    @endif
</ul>

{{--<div class="container">--}}
{{--    {{ PessoaComposer::getDatatableModal('pessoassinatura') }}--}}
{{--</div>--}}
