@extends('layout.main')

@section('title', 'Editando: ' . $users->name) 

@section('content')


<div id="user-edit-container" class="col-md-6 offset-md-3">
    <h1 style="margin-bottom: 20px">Editando: {{ $users->name }}</h1>
    <form action="/update/{{ $users->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input type="text" class="form-control" id="image" name="image" placeholder="foto de perfil">
        </div>
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome do usuário" value="{{$users->name}}">
        </div>
        <div class="form-group">
            <label for="name">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email do usuário" value="{{$users->email}}">
        </div>
        <div class="form-group">
            <label for="name" name="user-type">Tipo Usuário:</label>
            <select name="user-type" id="user-type" class="form-control">
                {{-- fazer em boolean --}}
                <option value="administrador" name="administrador" {{$users->user_type=="administrador" ? 'selected' : ''}}>administrador</option> 
                <option value="premium" name="premium" {{$users->user_type=="premium" ? 'selected' : ''}}>premium</option>
                <option value="free" name="free" {{$users->user_type=="free" ? 'selected' : ''}}>free</option>
            </select>
        </div>
        <input type="submit" class="btn btn-primary mb-5" value="Editar Usuário">
    </form>
</div>

















@endsection