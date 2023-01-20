<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <header class="bg-dark">
        <nav class="navbar bg-dark navbar-expand-lg navbar-dark container">

            <a href="" class="navbar-brand">
                <ion-icon class="d-inline-block align-top" name="film-outline"></ion-icon>
            </a>
            <span id="title" class="navbar-brand mb-0 h1">Space Filmes</span>

            <div class="collapse navbar-collapse" id="navbar">
                <form class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Pesquise seu filme.." aria-label="Search">
                </form>
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Pesquisar</button>
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link">Cadastrar</a>
                    </li>
                    
                </ul>
            </div>
        </nav>
    </header>
    
    @yield('content')
    <footer>Space Filmes &copy; 2023</footer>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>