@extends('layout.main')

@section('title', 'titulo do filme')

@section('content')

<div id="tela-filme" class="container">
        <div>
            <img id="paginafilme" src="/img/gatodebotas.jpg" alt="">
                @auth
                <div>
                
                    <a class="btn btn-danger" href="/telafilme">Assistir</a>
                </div>
                @endauth
                @guest
                <div>
                    <a class="btn btn-danger" href="/register">Cadastrar</a>
                </div>
                @endguest
        </div>
            <div id="conteudo-filme">
                <h1>Gato de botas 2: O último pedido</h1>
                <p>O Gato de Botas descobre que sua paixão pela aventura cobrou seu preço: ele já gastou oito de suas nove vidas. Ele então parte em uma jornada épica para encontrar o mítico Último Desejo e restaurar suas nove vidas.</p>
            </div>
</div>






@endsection