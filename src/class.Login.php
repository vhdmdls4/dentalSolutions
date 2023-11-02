<?php

require_once "Usuario.php";

class Login {

    private Usuario|null $logado;

    static private Login|null $login_ptr = null;

    private function __construct() {

        $logado = null;

    }

    static public function getInstance(): Login{

        if (self::$login_ptr == null) {

            self::$login_ptr = new Login();

        }

        return self::$login_ptr;

    }

    public function logar(Usuario $usuario) {

        $this->logado = $usuario;

    }

    public function deslogar() {

        $this->logado = null;

    }

}
