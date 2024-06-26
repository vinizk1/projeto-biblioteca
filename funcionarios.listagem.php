<?php
include_once("include/factory.php");

if (!Auth::isAuthenticated()) {
    header("location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Funcionarios da Biblioteca do Urubu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
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
            text-align: center;
            /* Centraliza o título */
        }

        button a {
            color: white;
            text-decoration: none;
        }

        #button {
            display: flex;
            align-items: center;
            justify-content: end;
        }

        .header img {
            display: block;
            margin: 0 auto 20px;
            /* Centraliza a imagem */
            max-width: 200px;
            border-radius: 50%;
            border: 5px solid white;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.5);
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.6);
            /* Cor da barra de navegação */
            margin-bottom: 0;
            /* Remove o espaçamento inferior da barra de navegação */
        }

        .navbar-nav .nav-link {
            color: white;
        }

        .navbar-nav .nav-item {
            margin-right: 10px;
            /* Espaçamento entre itens da navegação */
        }

        .navbar .btn-sair {
            margin-left: auto;
            /* Empurra o botão 'Sair' para a direita */
        }

        .container {
            text-align: center;
            margin-bottom: 20px;
            /* Adiciona espaçamento abaixo do container */
        }

        .btn-option {
            margin-bottom: 10px;
            /* Adiciona espaçamento entre os botões */
        }
    </style>
</head>

<body>
    <?php include("navbar.php") ?>
    <div class="header">
        <h1>Listagem de Funcionarios da Biblioteca do Urubu</h1>
        <img src="https://media-gru1-2.cdn.whatsapp.net/v/t61.24694-24/427448038_308706098910550_7498972035424756462_n.jpg?ccb=11-4&oh=01_ASA9ndp7U7QMr1N9TTWZFzUgYCoXSTIwaXvX8sAMgCaD9g&oe=662699B2&_nc_sid=e6ed6c&_nc_cat=107" alt="Logo da Biblioteca">
    </div>
    <div class="container">
        <br>
        <div id="button">
            <a href="funcionarios.novo.php" class="btn btn-info"> Adicionar Funcionário </a>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table">
                <thead>

                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Ações</th>

                </thead>
                <tbody>

                    <?php foreach (FuncionarioRepository::listAll() as $funcionario) {
                    ?>

                        <tr>
                            <td><?php echo $funcionario->getId(); ?></td>
                            <td><?php echo $funcionario->getNome(); ?></td>
                            <td><?php echo $funcionario->getTelefone(); ?></td>
                            <td><?php echo $funcionario->getEmail(); ?></td>
                            <td><?php echo $funcionario->getCpf(); ?></td>
                            <td>
                                <a href="funcionarios.editar.php?id=<?php echo $funcionario->getId(); ?>" class="btn btn-info">Editar</a>
                                <?php if (EmprestimoRepository::countByInclusaoFuncionario($funcionario->getId()) == 0 && EmprestimoRepository::countByAlteracaoFuncionario($funcionario->getId()) == 0 && EmprestimoRepository::countByDevolucaoFuncionario($funcionario->getId()) == 0 && EmprestimoRepository::countByRenovacaoFuncionario($funcionario->getId()) == 0 && ClienteRepository::countByInclusaoFuncionario($funcionario->getId()) == 0 && ClienteRepository::countByAlteracaoFuncionario($funcionario->getId()) == 0 && AutorRepository::countByInclusaoFuncionario($funcionario->getId()) == 0 && AutorRepository::countByAlteracaoFuncionario($funcionario->getId()) == 0 && LivroRepository::countByInclusaoFuncionario($funcionario->getId()) == 0 && LivroRepository::countByAlteracaoFuncionario($funcionario->getId()) == 0) { ?>
                                    <a href="funcionarios.excluir.php?id=<?php echo $funcionario->getId(); ?>" class="btn btn-danger">Excluir</a>
                                <?php } ?>

                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>