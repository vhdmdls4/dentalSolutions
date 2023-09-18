<?php

require_once("class.Funcionario.php");

class Dentista extends Funcionario
{
  private string $cro;
  private array $especialidade;

  public function __construct(float $salario, string $cro, array $especialidade, string $nome, string $telefone, string $email, string $CPF, Endereco $endereco)
  {
    parent::__construct($salario, $nome, $telefone, $email, $CPF, $endereco);
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
