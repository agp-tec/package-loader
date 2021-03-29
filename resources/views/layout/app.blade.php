<!DOCTYPE html>
<html lang="pt-br" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>
<head>
    <meta charset="utf-8"/>

    {{-- Title Section --}}
    <title>{{ config('app.name') }} • @yield('title', $page_title ?? '')</title>

    {{-- Meta Data --}}
    <meta name="description" content="@yield('page_description', $page_description ?? '')"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:url" content="{{ config('app.url') }}"/>
    <meta property="og:image" content="{{asset("media/APP/logos/png/logo-share-blue.png")}}"/>
    <meta property="og:image:url" content="{{asset("media/APP/logos/png/logo-share-blue.png")}}"/>
    <meta property="og:image:secure_url" content="{{asset("media/APP/logos/png/logo-share-blue.png")}}"/>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('media/APP/logos/favicon.ico') }}"/>

    {{-- Fonts --}}
    {{ Metronic::getGoogleFontsInclude() }}

    {{-- Global Theme Styles (used by all pages) --}}
    @foreach(config('layout.resources.css') as $style)
        <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}"
              rel="stylesheet" type="text/css"/>
    @endforeach

    {{-- Layout Themes (used by all pages) --}}
        @foreach (Metronic::initThemes() as $theme)
            <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($theme)) : asset($theme) }}" rel="stylesheet" type="text/css"/>
        @endforeach

        {{-- Includable CSS --}}
        @yield('styles')
    </head>

        <body {{ Metronic::printAttrs('body') }} {{ Metronic::printClasses('body') }}>

            @section('contentFull')
                @if(auth()->check() && auth()->user()->getAdmEmpresaId())
                    @if (config('layout.page-loader.type') != '')
                        @include('layout.partials._page-loader')
                    @endif

                    @include('layout.base._layout')
                @endif
            @show
            <script>var HOST_URL =
					@if(Auth::check() && Auth::user()->getAdmEmpresaId())
					"{{ route('web.quick-search') }}";
					@else
					"";
					@endif
            </script>

            {{-- Global Config (global config for global JS scripts) --}}
            <script>
                var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};
            </script>

            {{-- Global Theme JS Bundle (used by all pages)  --}}
            @foreach(config('layout.resources.js') as $script)
                <script src="{{ asset($script) }}" type="text/javascript"></script>
            @endforeach

            {{-- Includable JS --}}
            @yield('scripts')

        </body>

</html>

