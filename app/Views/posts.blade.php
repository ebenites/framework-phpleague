@extends('base')

@section('title', 'Home')

@section('sidebar')
    @parent
    <p>Más contenido del sidebar</p>
@endsection

@section('content')
    
    @forelse($posts as $post)
        <p>Título: {{ $post->title }}, Body: {{ $post->body }}, Autor: {{ $post->user->name }}</p>
    @empty
        <div class="alert alert-danger">No hay posts para este usuario</div>
    @endforelse
    
@endsection