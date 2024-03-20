<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="fvicon.favicon" type="image/x-icon">
    <title>Página Inicial da Biblioteca do Urubu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            background-color: #4CAF50;
            color: white;
            font-family: Arial, sans-serif;
        }

        .header {
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.6);
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.5);
        }

        .header h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #FFD700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            text-align: center; /* Centraliza o título */
        }

        button a {
            color: white;
            text-decoration: none;
        }

        .header img {
            display: block;
            margin: 0 auto 20px; /* Centraliza a imagem */
            max-width: 200px;
            border-radius: 50%;
            border: 5px solid white;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.5);
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.6); /* Cor da barra de navegação */
            margin-bottom: 0; /* Remove o espaçamento inferior da barra de navegação */
        }

        .navbar-nav .nav-link {
            color: white;
        }

        .navbar-nav .nav-item {
            margin-right: 10px; /* Espaçamento entre itens da navegação */
        }

        .navbar .btn-sair {
            margin-left: auto; /* Empurra o botão 'Sair' para a direita */
        }

        .container {
            text-align: center;
            margin-bottom: 20px; /* Adiciona espaçamento abaixo do container */
        }

        .btn-option {
            margin-bottom: 10px; /* Adiciona espaçamento entre os botões */
        }

        /* Estilo adicional para alinhar os botões horizontalmente */
        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .btn-option {
            margin: 5px; /* Espaçamento entre os botões */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Autor
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                            <li><a class="dropdown-item" href="autor.listagem.php">Listagem de Autores</a></li>
                            <li><a class="dropdown-item" href="#">Adicionar Autor</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Cliente
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <li><a class="dropdown-item" href="cliente.listagem.php">Listagem de Clientes</a></li>
                            <li><a class="dropdown-item" href="#">Adicionar Cliente</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Empréstimo
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
                            <li><a class="dropdown-item" href="#">Listagem de Empréstimos</a></li>
                            <li><a class="dropdown-item" href="#">Adicionar Empréstimo</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown4" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Funcionários
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown4">
                            <li><a class="dropdown-item" href="funcionarios.listagem.php">Listagem de Funcionários</a></li>
                            <li><a class="dropdown-item" href="#">Adicionar Funcionário</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown5" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Livro
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown5">
                            <li><a class="dropdown-item" href="livro.listagem.php">Listagem de Livros</a></li>
                            <li><a class="dropdown-item" href="#">Adicionar Livro</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <button class="btn btn-primary btn-danger"> <a href="logout.php">Sair</a></button>
        </div>
    </nav>

    <div class="header">
        <h1>Página Inicial da Biblioteca do Urubu</h1>
        <img src="http://www.emporiodenoticias.com/wp-content/uploads/2016/02/urubu-de-cabe%C3%A7a-vermelha-696x392.jpg"
            alt="Logo da Biblioteca">
    </div>

    <div class="container">
        <div class="button-container">
            <form method="POST">
            <form method="POST">
    <br>
    <br>
    <br>
    <br>
    <button class="btn btn-primary btn-option"><a href="autor.listagem.php">Autor</a></button>
    <button class="btn btn-primary btn-option"><a href="cliente.listagem.php">Cliente</a></button>
    <button class="btn btn-primary btn-option">Empréstimo</button>
    <button class="btn btn-primary btn-option"><a href="funcionarios.listagem.php">Funcionários</a></button>
    <button class="btn btn-primary btn-option"><a href="livro.listagem.php">Livro</a></button>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>
