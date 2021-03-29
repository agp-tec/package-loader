{{-- Header --}}
@if (config('layout.extras.quick-actions.dropdown.style') == 'light')
    <div class="d-flex flex-column flex-center py-10 bg-dark-o-5 rounded-top bg-light">
        <h4 class="text-dark font-weight-bold">
            Apps
        </h4>
        {{--        <span class="btn btn-success btn-sm font-weight-bold font-size-sm mt-2">23 tasks pending</span>--}}
    </div>
@else
    <div class="d-flex flex-column flex-center py-10 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url('{{ asset('media/misc/bg-1.jpg') }}')">
        <h4 class="text-white font-weight-bold">
            Apps
        </h4>
        {{--        <span class="btn btn-success btn-sm font-weight-bold font-size-sm mt-2">23 tasks pending</span>--}}
    </div>
@endif

{{-- Nav --}}
<div class="row row-paddingless">
    {{-- Item --}}
    <div class="col-6">
        {{--        TODO Enviar token para autorizar login--}}
        <a href="https://www.agapesolucoes.com.br" target="_blank"
           class="d-block py-10 px-5 text-center bg-hover-light border-right border-bottom">
            {{ Metronic::getSVG("media/svg/icons/Code/Puzzle.svg", "svg-icon-3x svg-icon-success") }}
            <span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">AGP</span>
            <span class="d-block text-dark-50 font-size-lg">Administrativo</span>
        </a>
    </div>

    {{-- Item --}}
    <div class="col-6">
        <a href="https://www.abrecaixa.com.br" target="_blank"
           class="d-block py-10 px-5 text-center bg-hover-light border-bottom">
            {{ Metronic::getSVG("media/svg/icons/Communication/Mail-attachment.svg", "svg-icon-3x svg-icon-info") }}
            <span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Abre Caixa</span>
            <span class="d-block text-dark-50 font-size-lg">Administrativo</span>
        </a>
    </div>

    {{-- Item --}}
    <div class="col-6">
        <a href="https://www.agapesolucoes.com.br/forum" target="_blank"
           class="d-block py-10 px-5 text-center bg-hover-light border-right">
            {{ Metronic::getSVG("media/svg/icons/Shopping/Box2.svg", "svg-icon-3x svg-icon-dark") }}
            <span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Fórum</span>
            <span class="d-block text-dark-50 font-size-lg">Discuções</span>
        </a>
    </div>

    {{-- Item --}}
    <div class="col-6">
        <a href="https://git.agapesolucoes.com.br/AGP" target="_blank"
           class="d-block py-10 px-5 text-center bg-hover-light">
            {{ Metronic::getSVG("media/svg/icons/Communication/Group.svg", "svg-icon-3x svg-icon-light") }}
            <span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">GIT</span>
            <span class="d-block text-dark-50 font-size-lg">Projetos</span>
        </a>
    </div>

    {{-- Item --}}
    <div class="col-6">
        <a href="https://bar.barfacil.com.br" target="_blank"
           class="d-block py-10 px-5 text-center bg-hover-light border-right">
            {{ Metronic::getSVG("media/svg/icons/Shopping/Box2.svg", "svg-icon-3x svg-icon-primary") }}
            <span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Bar Fácil</span>
            <span class="d-block text-dark-50 font-size-lg">Painel</span>
        </a>
    </div>

    {{-- Item --}}
    <div class="col-6">
        <a href="https://ingresso.ticketmais.com.br" target="_blank"
           class="d-block py-10 px-5 text-center bg-hover-light">
            {{ Metronic::getSVG("media/svg/icons/Communication/Group.svg", "svg-icon-3x svg-icon-danger") }}
            <span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Ticket Mais</span>
            <span class="d-block text-dark-50 font-size-lg">Painel</span>
        </a>
    </div>
</div>
