@extends('base')

@section('title', 'Home')

@section('sidebar')
    @parent
    <p>Más contenido del sidebar</p>
@endsection

@section('content')

    <div class="alert alert-info">Bienvenido {{ $user }}</div>
    
@endsection