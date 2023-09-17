<?php

require_once("class.Profissional.php");

class Funcionario extends Profissional
{
  private float $salario;

  public function __construct(float $salario)
  {
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
