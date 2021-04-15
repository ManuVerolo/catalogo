@extends('adminlte::page')

@section('title', 'Catalogo')

@section('content_header')
    @can('admin.products.create')
        <a class="btn btn-success btn-sm float-right" href="{{route('admin.products.create')}}">Nuevo Producto</a>    
    @endcan
    <h1>Lista de productos</h1>
@stop

@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        <strong>
            {{session('info')}}
        </strong>
    </div>
    @endif
    @livewire('admin.product-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop