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

    <!-- CSS da Aplicação  -->
    <link rel="stylesheet" href="/css/styles.css">


</head>
<body>

    <header class="bg-dark col-md-12">
        <nav class=" container navbar bg-dark navbar-expand-lg navbar-dark">

            <a href="/" class="navbar-brand">
                <ion-icon class="d-inline-block align-top" name="film-outline"></ion-icon>
            </a>
            <a id="title" href="/"><span class="navbar-brand mb-0 h1">Space Filmes</span></a>

            <div class="collapse navbar-collapse col-md-6" id="navbar">

                <form style="display: flex" class="form-inline mt-2 mt-md-0" action="/" method="GET">
                    <input style="border-radius: 25px" class="form-control mr-sm-2" type="text" placeholder="Pesquise seu filme.." id="search" name="search" aria-label="Search">
                    <button  class="btn btn-outline-light my-2 my-sm-0" type="submit" ><ion-icon name="search-circle-outline"></ion-icon></button>
                </form>
                
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
    
    @yield('content')
    <footer class="text-center">Space Filmes &copy; 2023</footer>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>