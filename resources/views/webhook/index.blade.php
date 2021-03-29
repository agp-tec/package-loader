@extends('layout.app')

@section('content')

{{--    Data e hora: 2020-09-05 15:34:37           --}}
{{--    View/index.blade gerada automaticamente       --}}

     <div class="card card-custom gutter-b">
        <div class="card-header border-0 py-5">
	    <div class="card-title">
                {{--<span class="card-icon">
                    <i class="flaticon-price-tag text-primary"></i>
                </span>--}}
                <h3 class="card-label">
                        <span class="d-block text-dark font-weight-bolder">Webhooks</span>
                        <span class="d-block text-dark-50 mt-2 font-size-sm">Aqui estão seus webhooks.</span>
                </h3>
            </div>
            <div class="card-toolbar">
                <a href="{{route('web.webhook.create')}}" class="btn btn-success font-weight-bolder font-size-sm">
                    <span class="svg-icon svg-icon-md svg-icon-white">{{ Metronic::getSVG('media/svg/icons/Code/Plus.svg') }}</span>
                    Adicionar</a>
            </div>
        </div>

        {{ WebhookComposer::getDatatable() }}

    </div>

    {{ LogComposer::get('adm_webhook') }}
@endsection
