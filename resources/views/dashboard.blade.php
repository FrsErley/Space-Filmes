@extends('layout.main')

@section('title', 'Area de Usuário')

@section('content')
   
<div class="col-md-10 offset-md-1 dashboard-title-container">

    <h1>Tela de Administrador</h1>

    <h2> Gerenciamento de Usuários</h2>

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
            @foreach($users as $users)
                <tr>
                    <td scope="row">{{ $loop->index + 1 }}</td>
                    <td> {{ $users->name }} </td>
                    <td> {{ $users->email }} </td>
                    <td> {{ $users->user_type}} </td>
                    <td id="buttons">
                        <a href="/edit/{{$users->id}}" class="btn btn-info edit-btn"> <ion-icon id="icon-edit" name="create-outline"></ion-icon>Editar</a> 
                        <form action="/edit/{{$users->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href=""></a>
                            <button type="submit" class="btn btn-danger block-btn"> Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</div>


@endsection