@php
    $direction = config('layout.extras.quick-panel.offcanvas.direction', 'right');
@endphp
{{-- Quick Panel --}}
<div id="kt_quick_panel" class="offcanvas offcanvas-{{ $direction }} pt-5 pb-10">
    {{-- Header --}}
    <div class="offcanvas-header offcanvas-header-navs d-flex align-items-center justify-content-between mb-5">
        <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-primary flex-grow-1 px-10"
            role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_notifications" id="notifytitle">Notificações
                    ({{ auth()->user()->unreadNotifications->count() }})</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_logs">Auditar acessos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_settings">
                    <i class="flaticon2-settings text-primary"></i>
                </a>
            </li>
        </ul>
        <div class="offcanvas-close mt-n1 pr-5">
            <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_panel_close">
                <i class="ki ki-close icon-xs text-muted"></i>
            </a>
        </div>
    </div>

    {{-- Content --}}
    <div class="offcanvas-content px-4">
        <div class="tab-content">
            {{-- Tabpane --}}
            <div class="tab-pane show pt-2 pr-5 mr-n5 active" id="kt_quick_panel_notifications" role="tabpanel">
                {{-- Nav --}}
                <div class="navi navi-icon-circle navi-spacer-x-0">
                    @if(auth()->user()->unreadNotifications->count() == 0)
                        <a href="#" class="navi-item">
                            <div class="navi-link rounded">
                                <div class="symbol symbol-50 mr-3">
                                    <div class="symbol-label">
                                        {{Metronic::getSVG('media/svg/icons/Navigation/Double-check.svg', 'svg-icon svg-icon-2x svg-icon-success')}}
                                    </div>
                                </div>
                                <div class="navi-text">
                                    <div class="font-weight-bold font-size-lg">
                                        Nenhuma notificação
                                    </div>
                                    <div class="text-muted">
                                        no momento!
                                    </div>
                                </div>
                            </div>
                        </a>
                    @else
                        <div id="list">
                            <div class="row d-flex justify-content-end mr-2">
                                <a href="javascript:;" class="navi-item" onclick="makeReaded(this)"
                                   data-value="#all"
                                   data-url="{{ route('web.notification.readall') }}">
                                    <div class="text-muted">
                                        Arquivar todas
                                    </div>
                                </a>
                            </div>
                            @foreach(auth()->user()->unreadNotifications as $notification)
                                {{-- Item --}}
                                <div id="{{ $notification->id }}" class="row d-flex">
                                    <div class="col-10">
                                        <a href="{{ $notification->data['actions']['link'] }}" class="navi-item">
                                            <div class="navi-link rounded">
                                                <div class="symbol symbol-50 mr-3">
                                                    <div class="symbol-label">
                                                        {{Metronic::getSVG($notification->data['icon'], 'svg-icon svg-icon-2x svg-icon-'.$notification->data['type'])}}
                                                    </div>
                                                </div>
                                                <div class="navi-text">
                                                    <div class="font-weight-bold font-size-lg">
                                                        {{ $notification->data['title'] }}
                                                    </div>
                                                    <div class="text-muted">
                                                        {{ $notification->data['subtitle'] }}
                                                    </div>
                                                    <div class="text-muted">
                                                        {{ \Agp\BaseUtils\Helper\Utils::getTimeElapsed($notification->created_at,false) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-2 d-flex py-0 align-items-center">
                                        <a href="javascript:;" class="btn" onclick="makeReaded(this)"
                                           data-value="#{{ $notification->id }}"
                                           data-url="{{ route('web.notification.read',['notification' => $notification->id]) }}">
                                            {{ \App\Helper\Theme\Metronic::getSVG('media/svg/icons/Communication/Incoming-box.svg', 'svg-icon svg-icon-success') }}</a>
                                    </div>
                                </div>
                                @if($loop->iteration >= 25)
                                    @break
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            {{-- Tabpane --}}
            <div class="tab-pane fade pt-3 pr-5 mr-n5" id="kt_quick_panel_logs" role="tabpanel">
                {{ UsuarioComposer::getAtividadeRecente(auth()->user()) }}
            </div>

            {{--            @include('UserPreferences::settings')--}}
        </div>
    </div>
    <script>
        var makeReaded = function (el) {
            $('body').addClass('ajax-loading');
            $.get($(el).data('url'), function (data) {
                var id = $(el).data('value');
                if (id == "#all") {
                    $("#notifytitle").html("Notificações (0)");
                    $("#list").html(`<a href="#" class="navi-item"><div class="navi-link rounded"><div class="symbol symbol-50 mr-3">
<div class="symbol-label">
{{Metronic::getSVG('media/svg/icons/Navigation/Double-check.svg', 'svg-icon svg-icon-2x svg-icon-success')}}
                    </div></div><div class="navi-text"><div class="font-weight-bold font-size-lg">Nenhuma notificação</div>
                    <div class="text-muted">no momento!</div></div></div></a>`);
                } else
                    $(id).remove();
                $('body').removeClass('ajax-loading');
                $('#pulse-ring-notification').remove();
            }).fail(function () {
                $('body').removeClass('ajax-loading');
            });
        }
    </script>
</div>
