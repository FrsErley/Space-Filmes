@extends('layout.main')

@section('title', 'Space Filmes')

@section('content')


<div class="container">

    <h2> Resultados para {{ $selectedGenre }}</h2>
        <div class="container fluid-container">
            @foreach($movies as $movie )
                @if ($loop->index < 30)
                    <a class="link-movie" href="/movie/{{$movie['id']}}">
                        <img id="image-movie" src={{"https://image.tmdb.org/t/p/w500". $movie['poster_path']}} alt="Imagem de capa do card">
                    </a>
                @endif
            @endforeach
        </div>
<div>






@endsection