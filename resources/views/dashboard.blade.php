@extends('layout.main')

@section('title', 'Area de Usuário')

@section('content')
   
<div class="col-md-10 offset-md-1 dashboard-title-container">

    <h1>Tela de Administrador</h1>

    <h2>Usuários</h2>

</div>

<div class="col-md-10 offset-md-1 dashboard-acounts-container">
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Tipo de conta</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $users)
                <tr>
                    <td scope="row">{{ $loop->index + 1 }}</td>
                    <td> {{ $users->name }} </td>
                    <td> {{ $users->email }} </td>
                    <td> {{ $users->user_type}} </td>
                    <td><a href="#">Tornar premium</a> <a href="#">Bloquear</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>


</div>

<div class="col-md-10 offset-md-1 dashboard-title-container">

    <h2>Filmes</h2>

</div>

<div class="col-md-10 offset-md-1 dashboard-acounts-container">
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Categoria</th>
                <th scope="col"></th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movie as $movies)
                <tr>
                    <td scope="row">{{ $loop->index + 1 }}</td>
                    <td> {{ $movies->title }} </td>
                    <td>  </td>
                    <td> </td>
                    <td><a href="#">Editar</a> <a href="#">Remover</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>


</div>


@endsection