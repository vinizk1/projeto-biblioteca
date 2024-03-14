<?php
include_once("include/factory.php");

if (Auth::isAuthenticated()) {
    header("location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body style=" background: rgb(253, 255, 255);
            background: linear-gradient(185deg, rgba(34,193,195,1) 26%, rgba(185,106,240,1) 85%); ">
    <br>
    <br>
    <br>
    <br>
    <div class="row mt-2">
        <div class="col-8 offset-2">
            <div style="text-align: center;border-radius: 40px;background-color: antiquewhite;">
                <h1>Fazer login na biblioteca do urubu</h1>
                <div>
                    <h4>Biblioteca do urubu!</h4>
                    <img src="http://www.emporiodenoticias.com/wp-content/uploads/2016/02/urubu-de-cabe%C3%A7a-vermelha-696x392.jpg">
                    <p>Em homenagem ao Zeca</p>
                </div>
                <form method="POST" action="logar.php">
                    <label>CPF
                        <input name="cpf" type="cpf" id="cpf" class="form-control" placeholder="Digite seu cpf" required />

                        <label>Senha
                            <input name="senha" type="password" id="senha" class="form-control" placeholder="Digite sua senha" required />
                            <br />
                            <button type="submit " class="btn btn-success">Enviar</button>
            </div>
        </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>