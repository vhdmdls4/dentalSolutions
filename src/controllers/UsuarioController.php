<?php
// FILEPATH: /c:/Users/vhdua/Desktop/dev/dentalSolutions/controllers/UsuarioController.php

// Inclua a classe Cliente para poder utilizá-la
require_once '../global.php';

class UsuarioController
{
    public function create()
    {
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];
        $perfil = $_POST['perfil'];

        try {

            $perfil = Perfil::getRecordsByField('nomePerfil', $perfil)[0];

            $usuario = new Usuario($login, $senha, $email, $perfil);
            $usuario->save();

            $usuarioDetails = [
                'login' => $usuario->getLogin(),
                'senha' => '**********',
                'email' => $usuario->getEmail(),
                'perfil' => $usuario->getPerfil()->getNomePerfil()
            ];

            echo json_encode(['titulo' => 'Usuario criado com sucesso', 'conteudo' => $usuarioDetails]);
        } catch (Exception $e) {
            echo json_encode(['error' => 'Erro ao criar usuario: ' . $e->getMessage()]);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new UsuarioController();
    $controller->create();
}
