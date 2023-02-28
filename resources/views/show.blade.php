@extends('layout.main')

@section('title',)

@section('content')

<div id="tela-filme" class="container">
        <div id="paginafilme">
            <img id="image-movie-show" src="{{"https://image.tmdb.org/t/p/w500". $movie['poster_path']}}" alt="">
                @auth

                <div id="buttons">
                    <a id="movie-button" class="btn btn-success" href="/telafilme">Assistir</a>
                    
                    <a  class="btn btn-danger"> <ion-icon name="heart-outline"></ion-icon></a>
                </div>
                @endauth
                @guest
                
                    <a id="button-guest" class="btn btn-secondary" href="/register">Crie uma conta</a>
            
                @endguest
                  
        </div>
        <div id="conteudo-filme">

                <h1>{{ $movie['title'] }} </h1>
                <p>{{ $movie['overview']}}</p>

                <div> <a href="">Assista ao trailer</a> </div>
                
                
        </div>

</div>

<div>
    <div class="container fluid-container">
        <h2>Imagens</h2>
        <div class="images-movie">
            @foreach($movie['images']['backdrops'] as $image)
                @if($loop->index < 6)
                    <div class= "image-movie">
                        <a class="image-size" style="text-decoration: none" href="">
                            <img class="img-size" style="width: 300px" src="{{ 'https://image.tmdb.org/t/p/w400' . $image['file_path'] }}">
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

<div>
    <div class="container fluid-container">
        <h2>Recomendações</h2>
        <div class="recommendations">
            @foreach($recommendations as $movies)
                @if($loop->index < 7)
                    <div style="width: 150px">
                        <a class="opacity-movie" href="/movie/{{$movies['id']}}">
                            <img class="movie-recommend" src="{{ 'https://image.tmdb.org/t/p/w500/' . $movies['poster_path'] }}" alt="">
                        </a>
                        <div class="mt-3">
                            <a class="fonte" href="/movie/{{$movies['id']}}"> {{ $movies['title']}} </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        
    </div>
</div>






@endsection