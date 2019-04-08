@component('mail::layout')
{{-- @component('mail::message') --}}
@slot('header')
    @component('mail::header', ['url' => config('app.url')])
        Re Fáciles
    @endcomponent
@endslot
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

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
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Regards'),<br>{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
@lang(
    "Si estás teniendo problemas con el boton \":actionText\", copiá y pegá el link de abajo:\n".
    "[link](:actionUrl)",
    [
        'actionText' => $actionText,
        'actionUrl' => $actionUrl
    ]
)
@endcomponent
@endisset
@slot('footer')
    @component('mail::footer')
        Re Fáciles
    @endcomponent
@endslot
@endcomponent
