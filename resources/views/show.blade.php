@extends('layout.main')

@section('title', 'titulo do filme')

@section('content')

<div id="tela-filme" class="container">
        <div id="paginafilme" >
            <img src="/img/gatodebotas.jpg" alt="">
                @auth
                <div>
                    <a class="btn btn-success" href="/telafilme">Assistir</a>
                </div>
                @endauth
                @guest
                <div>
                    <a class="btn btn-primary" href="/login">Faça login</a>
                </div>
                @endguest
        </div>
        <div id="conteudo-filme">
                <h1>Gato de botas 2: O último pedido</h1>
                <p>O Gato de Botas descobre que sua paixão pela aventura cobrou seu preço: ele já gastou oito de suas nove vidas. Ele então parte em uma jornada épica para encontrar o mítico Último Desejo e restaurar suas nove vidas.</p>
                <iframe id="trailer" width="560" height="315" src="https://www.youtube.com/embed/QAcn7cWm_hc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
</div>






@endsection