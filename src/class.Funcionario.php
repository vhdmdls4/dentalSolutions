<?php

require_once("class.Profissional.php");

class Funcionario extends Profissional
{
  private float $salario;

  public function __construct(float $salario, string $nome, string $telefone, string $email, string $CPF, Endereco $endereco)
  {
    parent::__construct($nome, $telefone, $email, $CPF, $endereco);
    $this->salario = $salario;
  }

  static public function getFilename()
  {
    return 'funcionarios.txt';
  }

  public function setSalario(float $salario)
  {
    $this->salario = $salario;
  }

  public function getSalario(): float
  {
    return $this->salario;
  }
}
