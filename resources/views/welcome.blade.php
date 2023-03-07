@extends('layout.main')

@section('title', 'Space Filmes')

@section('content')


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block" src="/img/filmes/spacecapa.jpg" alt="Primeiro Slide">
      </div>
      <div class="carousel-item">
        <img class="d-block" src="/img/filmes/thelast.jpg" alt="Segundo Slide">
      </div>
      <div class="carousel-item">
        <img class="d-block" src="/img/filmes/matrix.jpg" alt="Segundo Slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span aria-hidden="true">
            <ion-icon id="icone-carrosel" style="color: #ffff" name="caret-back-outline"></ion-icon>
        </span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span aria-hidden="true">
            <ion-icon id="icone-carrosel" style="color: #ffff" name="caret-forward-outline"></ion-icon>
        </span>
    </a>
  </div>

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
          <a class="dropdown-item text-white" href="/genre/16">Animação</a>
        </div>
      </div>

    {{-- @if($filter) --}}


    {{-- @else --}}

    <div>
        <h2>Filmes Populares</h2>
            <div class="container fluid-container">
                @foreach($popularMovie as $movie )
                    @if ($loop->index < 10)
                        <a class="link-movie" href="/movie/{{$movie['id']}}">
                            <img id="image-movie" src={{"https://image.tmdb.org/t/p/w500". $movie['poster_path']}} alt="Imagem de capa do card">
                        </a>
                    @endif
                @endforeach
            </div>
    <div>

    <div>
        <h2>Lançamentos</h2>
            <div class="container fluid-container">
                @foreach($upcoming as $movie )
                    @if ($loop->index < 10)
                        <a class="link-movie" href="/movie/{{$movie['id']}}">
                            <img id="image-movie" src={{"https://image.tmdb.org/t/p/w500". $movie['poster_path']}} alt="Imagem de capa do card">
                        </a>
                    @endif
                @endforeach
            </div>
    </div>

    <div>
        <h2>Animações</h2>
            <div class="container fluid-container">
                @foreach($animation as $movie )
                    @if ($loop->index < 10)
                        <a class="link-movie" href="/movie/{{$movie['id']}}">
                            <img id="image-movie" src={{"https://image.tmdb.org/t/p/w500". $movie['poster_path']}} alt="Imagem de capa do card">
                        </a>
                    @endif
                @endforeach
            </div>
    </div>


    {{-- @endif --}}

    

</div>



@endsection