<?php

abstract class Funcionario extends Profissional
{
  private float $salario;

  public function __construct(float $salario, string $nome, string $telefone, string $email, string $CPF, Endereco $endereco)
  {
    parent::__construct($nome, $telefone, $email, $CPF, $endereco);
    $this->salario = $salario;
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
