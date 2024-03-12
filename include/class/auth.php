<?php

class Auth
{
    private $expires_time = 1200;
    public static function login($cpf, $senha)
    {
        $funcionario = FuncionarioRepository::getByCPF($cpf);

        if ($funcionario) {
            if ($funcionario->checkSenha($senha)) {
                $_SESSION["is_authenticated"] = true;
                $_SESSION["funcionario_id"] = $funcionario->getId();
                $_SESSION["auth_expires_at"] = time() + self::$expires_time;

                return "Autenticado com sucesso";
            }
            return "Senha incorreta - Tente novamente";
        }
        return "Login não encontrado";
    }

    public static function logout()
    {
        unset($_SESSION["is_authenticated"]);
        unset( $_SESSION["funcionario_id"]);
        unset($_SESSION["auth_expires_at"]);
    }

    public static function isAuthenticated()
    {
        if(isset($_SESSION["is_authenticated"])){
            if($_SESSION["is_authenticated"]){
                if($_SESSION["auth_expires_at"] >= time()){
                    $_SESSION["auth_expires_at"] = time() + self::$expires_time;

                    return true;
                }
            }
        }
        self::logout();
        return false;
    }

    public static function getUser()
    {
        if(self::isAuthenticated()){
            return FuncionarioRepository::get($_SESSION["funcionario_id"]);
        }
        return null;
    }
}
