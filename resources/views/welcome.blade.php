@extends('layout.main')

@section('title', 'Space Filmes')

@section('content')
   

<div id="carrosel-controles" class="container carousel slide" data-ride="carousel">

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/img/filmes/thelastt.jpg" class="img-fluid" alt="">
            <div class="carousel-caption">
                <h1></h1>
            </div>
        </div>
    </div>

    <a href="#carousel-controles" class="carousel-control-prev" data-slide="prev">
        <span><ion-icon style="color: #ffff" name="caret-back-outline"></ion-icon></span>
    </a>
    <a href="#carousel-controles" class="carousel-control-next" data-slide="prev">
        <span><ion-icon style="color: #ffff" name="caret-forward-outline"></ion-icon></span>
    </a>

</div>

@auth

<div class="container">

    <h2>Minha lista</h2>

    
    <div class="container">

    
    <a href="/movie"><img id="image-movie" src="img/filmes/3197518.jpg" alt="Imagem de capa do card"></a>
    
   
</div>

</div>

@endauth  

<div class="container">

    <h2>Filmes Populares</h2>

    <div class="container">

    @foreach($movie as $movies)
    
    <a href="/movie/{{$movies->id}}"><img id="image-movie" src="img/filmes/{{ $movies->poster }}" alt="Imagem de capa do card"></a>

    @endforeach
    
</div>

</div>




@endsection