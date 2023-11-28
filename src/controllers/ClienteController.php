<?php
// FILEPATH: /c:/Users/vhdua/Desktop/dev/dentalSolutions/controllers/ClienteController.php

// Inclua a classe Cliente para poder utilizá-la
require_once '../class.Cliente.php';

class ClienteController
{
  public function create()
  {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];

    try {
      $cliente = new Cliente($nome, $telefone, $email, $cpf, $rg);
      $cliente->save();

      $clienteDetails = [
        'nome' => $cliente->getNome(),
        'telefone' => $cliente->getTelefone(),
        'email' => $cliente->getEmail(),
        'cpf' => $cliente->getCpf(),
        'rg' => $cliente->getRg()
      ];

      echo json_encode(['titulo' => 'Cliente criado com sucesso', 'conteudo' => $clienteDetails]);
    } catch (Exception $e) {
      http_response_code(500);
      echo json_encode(['error' => 'Erro ao criar cliente: ' . $e->getMessage()]);
    }
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $controller = new ClienteController();
  $controller->create();
}
