<?php

require_once("class.Funcionario.php");

class Dentista extends Funcionario
{
  private $cro;
  private array $especialidade;

  public function __construct($salario, $cro, array $especialidade)
  {
    parent::__construct($salario);

    $this->cro = $cro;
    $this->especialidade = $especialidade;
  }

  public function setCro($cro)
  {
    $this->cro = $cro;
  }

  public function getCro()
  {
    return $this->cro;
  }

  public function setEspecialidade(array $especialidade)
  {
    $this->especialidade = $especialidade;
  }

  public function getEspecialidade(): array
  {
    return $this->especialidade;
  }
}
