@extends('layout.app')

@section('contentFull')
    {{ \App\ViewComposer\AplicativoPoliticaAceiteUsuarioComposer::showDoc($aplicativoPolitica,true) }}
@endsection
