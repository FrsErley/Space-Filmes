@extends('layout.main')

@section('title', 'Space Filmes')

@section('content')


<div class="container">

    <div class="btn-group mt-4">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Gêneros
        </button>
        <div class="dropdown-menu bg-dark">
          @foreach($genres as $id => $genre)
                <a class="dropdown-item text-white" href="/genre/{{$id}}"> {{$genre}} </a>
          @endforeach
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