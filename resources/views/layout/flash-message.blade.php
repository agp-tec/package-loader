@if ($message = Session::get('success'))
    <div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
        <div class="alert-icon"><i class="la la-check"></i></div>
        <div class="alert-text">{{ $message }}</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
        <div class="alert-icon"><i class="flaticon-warning"></i></div>
        <div class="alert-text">{{ $message }}</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
@endif


@if ($message = Session::get('warning'))
    <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
        <div class="alert-icon"><i class="flaticon-warning"></i></div>
        <div class="alert-text">{{ $message }}</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
@endif


@if ($message = Session::get('info'))
    <div class="alert alert-custom alert-light-primary fade show mb-5" role="alert">
        <div class="alert-icon"><i class="la la-info-circle"></i></div>
        <div class="alert-text">{{ $message }}</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
@endif

@if ($errors->any())
    <div
        class="alert alert-custom @if(Route::current()->getName() == 'login') alert-outline-2x alert-outline-danger @else alert-light-danger @endif fade show mb-5">
        <div class="alert-icon">
            <i class="flaticon-warning"></i>
        </div>
        <ul class="alert-text mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="ki ki-close"></i>
                </span>
            </button>
        </div>
    </div>
@endif
