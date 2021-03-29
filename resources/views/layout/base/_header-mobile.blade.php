{{-- Header Mobile --}}
<div id="kt_header_mobile" class="header-mobile {{ Metronic::printClasses('header-mobile', false) }}" {{ Metronic::printAttrs('header-mobile') }}>
    <div class="mobile-logo">
        <a href="{{ url('/') }}">

            @php
                $kt_logo_image = 'logo-white-sm.png'
            @endphp

            @if (config('layout.aside.self.display') == false)

                @if (config('layout.header.self.theme') === 'light')
                    @php $kt_logo_image = 'logo-black-sm.png' @endphp
                @elseif (config('layout.header.self.theme') === 'dark')
                    @php $kt_logo_image = 'logo-white.png' @endphp
                @endif

            @else

                @if (config('layout.brand.self.theme') === 'light')
                    @php $kt_logo_image = 'logo-black-sm.png' @endphp
                @elseif (config('layout.brand.self.theme') === 'dark')
                    @php $kt_logo_image = 'logo-white-sm.png' @endphp
                @endif

            @endif

            <img alt="{{ config('app.name') }}" src="{{ asset('media/APP/logos/png/'.$kt_logo_image) }}"/>
        </a>
    </div>
    <div class="mobile-toolbar">

        @if (config('layout.aside.self.display'))
            <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle"><span></span></button>
        @endif

        @if (config('layout.header.menu.self.display'))
            <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle"><span></span></button>
        @endif

        <button class="btn btn-hover-text-primary p-0 ml-2 active" id="kt_header_mobile_topbar_toggle">
            {{ Metronic::getSVG('media/svg/icons/General/User.svg') }}
        </button>
    </div>
</div>