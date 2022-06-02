@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Categoria articulos</h1>
    @livewireStyles
@stop

@section('content')
        @livewire('categoria-articulos')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
@stop

@section('js')
    <script src="{{ mix('js/app.js') }}" defer></script>
    @livewireScripts
@stop