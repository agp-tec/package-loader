{{-- Content --}}
@if (config('layout.content.extended'))
    @yield('content')
@else
    @include('layout.flash-message')

    <div class="{{ Metronic::printClasses('content-container', false) }}">
        @yield('content')
    </div>
@endif
