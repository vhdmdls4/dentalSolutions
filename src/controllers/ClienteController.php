<?php
// FILEPATH: /c:/Users/vhdua/Desktop/dev/dentalSolutions/controllers/ClienteController.php

// Inclua a classe Cliente para poder utilizá-la
require_once '../class.Cliente.php';

class ClienteController
{
  public function create()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nome = $_POST['nome'];
      $telefone = $_POST['telefone'];
      $email = $_POST['email'];
      $cpf = $_POST['cpf'];
      $rg = $_POST['rg'];

      try {
        $cliente = new Cliente($nome, $telefone, $email, $cpf, $rg);
        // Aqui você pode salvar o cliente no banco de dados ou fazer o que precisar com ele

        echo 'Cliente criado com sucesso!';
        echo "<pre> $cliente </pre>";
      } catch (Exception $e) {
        // Aqui você pode lidar com erros na criação do cliente, como email ou CPF inválidos
        echo 'Erro ao criar cliente: ' . $e->getMessage();
      }
    }
  }
}

$controller = new ClienteController();
$controller->create();
