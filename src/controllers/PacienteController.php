<?php
require_once 'class.Paciente.php';

class PacienteController
{
  public function create()
  {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $dataNascimento = $_POST['dataNascimento'];
    $responsavelFinanceiro = $_POST['responsavelFinanceiro'];
    $rg = $_POST['rg'];

    $paciente = new Paciente($nome, $telefone, $email, $cpf, $dataNascimento, $responsavelFinanceiro, $rg);

    echo json_encode($paciente);
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $pacienteController = new PacienteController();
  $pacienteController->create();
}
