@extends('adminlte::page')

@section('title', 'Catalogo')

@section('content_header')
    <h1>Listado de categorías</h1>
@stop

@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        <strong>
            {{session('info')}}
        </strong>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            @can('admin.categories.create')
                <a class="btn btn-success" href="{{route('admin.categories.create')}}">Agregar categoria</a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th colspan="2"></th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            @can('admin.categories.edit')
                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.categories.edit', $category)}}">Editar</a>
                                </td>
                            @endcan
                            @can('admin.categories.destroy')
                                <td width="10px">
                                    <form action="{{route('admin.categories.destroy', $category)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>  
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

