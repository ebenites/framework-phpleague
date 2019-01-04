@extends('base')

@section('title', 'Home')

@section('sidebar')
    @parent
    <p>Más contenido del sidebar</p>
@endsection

@section('content')

    @forelse($users as $user)
        <p>Usuario con nombre {{ $user->name }} y email {{ $user->email }}</p>
    @empty
        <div class="alert alert-danger">No hay usuarios registrados</div>
    @endforelse
    
@endsection