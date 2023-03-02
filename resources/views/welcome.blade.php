@extends('layout.main')

@section('title', 'Space Filmes')

@section('content')
   

<div id="carrosel-controles" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/img/filmes/spacecapa.jpg" class="img-fluid" alt="">
            <div class="carousel-caption">
                <h1></h1>
            </div>
        </div>
    </div>

    <a href="#carousel-controles" class="carousel-control-prev" data-slide="prev">
        <span><ion-icon id="icone-carrosel" style="color: #ffff" name="caret-back-outline"></ion-icon></span>
    </a>
    <a href="#carousel-controles" class="carousel-control-next" data-slide="prev">
        <span><ion-icon id="icone-carrosel" style="color: #ffff" name="caret-forward-outline"></ion-icon></span>
    </a>

</div>

<div class="container">

    {{-- @if($search)
        <h2>buscando por: {{ $search }}</h2>
    @else --}}

    <div>
        <h2>Filmes Populares</h2>
            <div class="container fluid-container">
                @foreach($popularMovie as $movie )
                    @if ($loop->index < 15)
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
                    @if ($loop->index < 15)
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