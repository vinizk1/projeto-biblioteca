<?php
include_once("include/factory.php");

if (!Auth::isAuthenticated()) {
    header("location: login.php");
    exit();
}

if(!isset($_GET["id"])){
    header("location: cliente.listagem.php");
    exit();
}

if($_GET["id"] == "" || $_GET["id"] == null){
    header("location: cliente.listagem.php");
    exit();
}

$cliente = ClienteRepository::get($_GET["id"]);

if(!$cliente){
    header("location: cliente.listagem.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Cliente na Biblioteca do Urubu</title>
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

        #button{
            display: flex;
            align-items: center;
            justify-content: end;
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
    </style>
</head>

<body>
<?php include("navbar.php") ?>
    <div class="header">
        <h1>Editar Cliente na Biblioteca do Urubu</h1>
        <img src="http://www.emporiodenoticias.com/wp-content/uploads/2016/02/urubu-de-cabe%C3%A7a-vermelha-696x392.jpg"
            alt="Logo da Biblioteca">
    </div>
    <div class="row mt-4">
        <div class="col-md-6 offset-3" style="text-align: center;">
            <form action="cliente.editar.post.php" method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label" style="color: black;">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome" value="<?php echo $cliente->getNome(); ?>">

                    <label for="nome" class="form-label" style="color: black;">Telefone</label>
                    <input type="text" name="telefone" class="form-control" id="telefone" value="<?php echo $cliente->getTelefone(); ?>">

                    <label for="nome" class="form-label" style="color: black;">Email</label>
                    <input type="text" name="email" class="form-control" id="email" value="<?php echo $cliente->getEmail(); ?>">

                    <label for="nome" class="form-label" style="color: black;">CPF</label>
                    <input type="text" name="cpf" class="form-control" id="cpf" value="<?php echo $cliente->getCpf(); ?>">

                    <label for="nome" class="form-label" style="color: black;">RG</label>
                    <input type="text" name="rg" class="form-control" id="rg" value="<?php echo $cliente->getRg(); ?>">

                    <label for="nome" class="form-label" style="color: black;">Data Nascimento</label>
                    <input type="date" name="data_nascimento" class="form-control" id="data_nascimento" value="<?php echo $cliente->getDataNascimento(); ?>">

                </div>
                <div class="mb-3">  
                    <input type="hidden" name="id" value="<?php echo $cliente->getId(); ?>">
                    <a href="cliente.novo.php" class="btn btn-danger">Novo</a>
                    <a href="cliente.listagem.php" class="btn btn-danger">Voltar</a>
                    <button type="submit" class="btn btn-info">Enviar</button>
                </div>
            </form>
        </div>
    
  </div>
</body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>
