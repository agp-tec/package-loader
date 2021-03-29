{{-- Begin Image Card --}}
<div class="col-12 col-md-5 col-lg-4 d-flex">
    <div class="card card-custom gutter-b w-100">
        <div class="card-header border-0 py-5 d-flex d-md-none ">
            <div class="card-title"></div>
            <div class="card-toolbar">
                <a href="{{route('web.pessoa.index') }}" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                    {{ Metronic::getSVG('media/svg/icons/Code/Error-circle.svg', "svg-icon svg-icon-md svg-icon-primary mr-0") }}
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between flex-column pt-md-4">
                <div class="d-flex flex-column flex-center">
                    <div class="image-input image-input-outline image-input" id="kt_user_avatar"
                         style="background-image: url({{asset("/media/users/blank.png")}})">
                        <div class="image-input-wrapper"></div>
                        <button type="button"
                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                data-action="change" title="" data-original-title="Alterar Imagem">
                            <i class="fa fa-pen icon-sm text-muted"></i>
                        </button>
                    </div>
                </div>
                <div class="pt-15 pt-md-25 pt-lg-20">
                    @include('pessoa.perfil.partials.imagem.cards')
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End Image Card --}}