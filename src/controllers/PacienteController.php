<?php

require_once('../global.php');

class PacienteController
{
  public function create()
  {
    $clientesContainer = container::getInstance('clientes.txt');
    $clientes = $clientesContainer->getObjects();

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $dataNascimento = $_POST['dataNascimento'];
    $rg = $_POST['rg'];
    $cpfResponsavelFinanceiro = $_POST['responsavelFinanceiro'];

    $responsavelFinanceiro = null;

    foreach ($clientes as $cliente) {
      if ($cliente->getCpf() === $cpfResponsavelFinanceiro) {
        $responsavelFinanceiro = $cliente;
        break;
      }
    }

    try {
      if ($responsavelFinanceiro === null) {
        throw new Exception('Responsável financeiro não encontrado.');
      }

      $paciente = new Paciente($nome, $telefone, $email, $cpf, $dataNascimento, $responsavelFinanceiro, $rg);

      $responsavelFinanceiro->adicionaPaciente($paciente);
      $responsavelFinanceiro->save();

      $pacienteDetails = [
        'nome' => $paciente->getNome(),
        'telefone' => $paciente->getTelefone(),
        'email' => $paciente->getEmail(),
        'cpf' => $paciente->getCpf(),
        'rg' => $paciente->getRg(),
        'dataNascimento' => $paciente->getDataNascimento(),
        'responsavelFinanceiro' => $paciente->getResponsavelFinanceiro()->getNome(),
      ];

      $paciente->save();

      echo json_encode(['titulo' => 'Paciente criado com sucesso', 'conteudo' => $pacienteDetails]);
    } catch (Exception $e) {
      echo json_encode(['error' => 'Erro ao criar Paciente: ' . $e->getMessage()]);
    }
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $pacienteController = new PacienteController();
  $pacienteController->create();
}
