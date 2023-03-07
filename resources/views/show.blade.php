@extends('layout.main')

@section('title',)

@section('content')

<div class="background-image" style="background-image: url('{{'https://image.tmdb.org/t/p/original/' . $movie['backdrop_path']}}')">
    <div style="background-color:rgba(20, 24, 32, 0.5);">
        <div id="tela-filme" class="container">
            <div id="paginafilme">
                <img id="image-movie-show" src="{{"https://image.tmdb.org/t/p/w500". $movie['poster_path']}}" alt="">
                    @auth

                    <div id="buttons">
                        <a id="movie-button" class="btn btn-success border border-light" href="/telafilme">Assistir</a>
                        
                        <a  class="btn btn-danger"> <ion-icon name="heart-outline"></ion-icon></a>
                    </div>
                    @endauth
                    @guest
                    
                        <a id="button-guest" class="btn btn-success border border-dark" href="/register">Crie uma conta</a>
                
                    @endguest
                    
            </div>
            <div id="conteudo-filme">

                    <h1 style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">{{ $movie['title'] }} </h1>
                    <p style="font-size: 18px">{{ $movie['overview']}}</p>

                    <div style="margin-bottom: 30px; display:inline-block">

                        {{-- fazer um if caso o filme não tenha trailer --}}
                        @if($movie['videos']['results'])
                        <a class="btn btn-primary border border-light" style="text-decoration: none; color: rgb(240, 233, 233); font-size:20px; display:flex; align-items:center;" href="https://www.youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}"> <ion-icon  style="font-size:30px; color:rgb(253, 247, 247);" name="caret-forward-circle-outline"></ion-icon> Assista ao trailer</a>
                        @endif 
                    </div>
                    
             </div>
        </div>
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
                            @if ($movies['poster_path'])
                                <img class="movie-recommend" src="{{ 'https://image.tmdb.org/t/p/w500/' . $movies['poster_path'] }}" alt="">
                                @else
                                    <img style=" margin-right: 8px; border-radius: 10px" src="https://via.placeholder.com/150x225" alt="poster">
                                @endif
                            
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