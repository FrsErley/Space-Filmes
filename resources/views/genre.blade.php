@extends('layout.main')

@section('title', 'Space Filmes')

@section('content')


<div class="container">

    <div class="btn-group mt-4">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Gêneros
        </button>
        <div class="dropdown-menu bg-dark">
          <a class="dropdown-item text-white" href="/genre/28">Ação</a>
          <a class="dropdown-item text-white" href="/genre/12">Aventura</a>
          <a class="dropdown-item text-white" href="/genre/35">Comédia</a>
          <a class="dropdown-item text-white" href="/genre/18">Drama</a>
          <a class="dropdown-item text-white" href="/genre/16">Romance</a>
          <a class="dropdown-item text-white" href="/genre/27">Terror</a>
          <a class="dropdown-item text-white" href="/genre/10402">Musica</a>
          <a class="dropdown-item text-white" href="/genre/9648">Mistério</a>
        </div>
      </div>

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