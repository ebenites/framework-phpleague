@extends('base')

@section('title', 'Home')

@section('sidebar')
    @parent
    <p>Más contenido del sidebar</p>
@endsection

@section('content')

    Hola {{ $name }} tienes {{ $age }} años;
    
@endsection