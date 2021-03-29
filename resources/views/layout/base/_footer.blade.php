{{-- Footer --}}

<div class="footer bg-white py-4 d-flex flex-lg-column {{ Metronic::printClasses('footer', false) }}" id="kt_footer">
    {{-- Container --}}
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
        {{-- Nav --}}
        <div class="nav nav-dark order-1 order-md-2">
            <a href="#" target="_blank" class="nav-link pr-3 pl-0">Sobre</a>
            <a href="#" target="_blank" class="nav-link px-3">Equipe</a>
            <a href="#" target="_blank" class="nav-link pl-3 pr-0">Contato</a>
        </div>

        {{-- Copyright --}}
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted font-weight-bold mr-2">{{ date("Y") }} &copy;</span>
            <a href="https://www.agapesolucoes.com.br/" target="_blank" class="text-dark-75 text-hover-primary">AGP </a>
            <span class="text-muted font-weight-bold mr-2"> v{{ \Agp\BaseUtils\Helper\Utils::getVersion() }}</span>
        </div>
    </div>
</div>
