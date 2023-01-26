@extends('layout.main')

@section('title', $movie->title)

@section('content')

<div id="tela-filme" class="container">
        <div id="paginafilme">
            <img id="image-movie-show" src="/img/filmes/{{ $movie->poster }}" alt="">
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

                <h1>{{ $movie->title }}</h1>
                <p>{{ $movie->description}}</p>

                <div><iframe width="560" height="315" src="https://www.youtube.com/embed/sLk94T-hS78" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
                
                
        </div>
</div>






@endsection