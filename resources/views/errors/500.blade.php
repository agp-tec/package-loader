@extends('layout.app')

@section('title', 'OOPS!')

@section('contentFull')
    <!--begin::Error-->
    <div class="d-flex flex-row-fluid flex-column bgi-size-cover bgi-position-center bgi-no-repeat p-10 p-sm-30"
         style="background-image: url({{ asset('media/error/bg5.jpg') }});">
        <!--begin::Content-->
        <h1 class="font-weight-boldest text-dark-75 mt-15" style="font-size: 10rem">500</h1>
        <p class="font-size-h3 text-muted font-weight-normal">OOPS! Algo errado não está certo.</p>
        <!--end::Content-->
    </div>
    <!--end::Error-->
@endsection
