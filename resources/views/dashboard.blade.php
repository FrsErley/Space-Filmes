@extends('layout.main')

@section('title', 'Area de Usuário')

@section('content')
   
<div id="acount-area" class="col-md-10 offset-md-1" style="">
    <h1>Quem está assistindo ?</h1>

    <div id="user-area" class="col-md-10 offset-md-1">
        <div id="cards-area">
            <div>
                
                    <div class="card" >
                        <a href="/">
                        <img class="card-img-top" src="/img/users/comum.jpg" alt="Card image cap">
                        <div class="card-body">
                        <h5 style="color: aliceblue" class="card-title">Usuário Comum</h5>
                        </a>
                    </div>
                
                </div>
            </div>

            <div>
                <div class="card" >
                    <img class="card-img-top" src="/img/users/premium.jpg" alt="Card image cap">
                    <div class="card-body">
                    <h5 style="color: aliceblue" class="card-title">Administrador</h5>
                    </div>
                </div>
            </div>
        </div>
            <div id="options-area">
                <a class="btn btn-secondary" href="">Adicionar Usuário</a>
    
                <a class="btn btn-secondary" href="">Bloquear Usuário</a> 
            </div>
    </div>
    
</div>

</div>


@endsection