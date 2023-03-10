<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Fontes do Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    

    {{-- JS Bootstrap --}}

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- CSS da Aplicação  -->
    <link rel="stylesheet" href="/css/styles.css">

    @livewireStyles
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>

    <header class="bg-dark col-md-12">
        <nav class=" container navbar bg-dark navbar-expand-lg navbar-dark">

            <a href="/" class="navbar-brand">
                <ion-icon id="logo" class="d-inline-block align-top" name="film-outline"></ion-icon>
            </a>
            <a id="title" href="/"><span class="navbar-brand mb-0 h1">Space Filmes</span></a>

            <div class="collapse navbar-collapse col-md-6" id="navbar">

                <livewire:search-dropdown>
                
                <ul class="navbar-nav justify-content-end">
                    @guest
                    <li class="nav-item">
                        <a href="/login" class="nav-link" style="">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link">Cadastre-se</a>
                    </li>
                    @endguest

                    @auth
                    <li class="nav-item">
                        <a href="/account" class="nav-link">Minha conta</a>
                    </li>

                    <li class="nav-item">
                        <form action="/logout" method="POST">
                        @csrf
                        <a href="/logout" class="nav-link" 
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        Logout</a>
                        </form>
                    </li>
                    @endauth


                    
                </ul>
            </div>
        </nav>
    </header>

    
        <div>
            <div class="row">
                @if(session('msg'))
                    <p class="msg">{{ session('msg')}}</p>
                @endif
                
            </div>
        </div>

        @yield('content')
    
    
    
    <footer class="text-center">Space Filmes &copy; 2023</footer>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    @livewireScripts
</body>
</html>