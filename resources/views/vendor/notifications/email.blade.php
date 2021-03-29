@component('mail::message')
{{-- ATENCAO NAO PODE TER IDENTACAO. DEVE FICAR TUDO SEM TABS --}}
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{!! $line !!}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
switch ($level) {
case 'success':
case 'error':
$color = $level;
break;
default:
$color = 'primary';
}
?>
@if(is_array($actionUrl))
@foreach($actionText as $key => $actions)
@component('mail::button', ['url' => $actionUrl[$key], 'color' => $color])
{{ $actionText[$key] }}
@endcomponent
@endforeach
@else
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endif
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{!! $line !!}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Regards'),<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
"If you’re having trouble clicking the button, copy and paste the URL below\n".
'into your web browser:'
)
@if(is_array($actionUrl))
@foreach($actionText as $key => $actions)
<p>{{$actionText[$key]}}: <span class="break-all"> <a
href="{{$actionUrl[$key]}}">{{ $displayableActionUrl[$key] }}</a></span></p>
@endforeach
@else
<span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl  }})</span>
@endif
@endslot
@endisset
@endcomponent
