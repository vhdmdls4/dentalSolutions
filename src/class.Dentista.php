<?php

require_once("class.Profissional.php");

class Dentista extends Profissional
{
  protected string $cro;
  protected array $especialidade;

  public function __construct(string $cro, array $especialidade, string $nome, string $telefone, string $email, string $CPF, Endereco $endereco)
  {
    parent::__construct($nome, $telefone, $email, $CPF, $endereco);
    $this->cro = $cro;
    $this->especialidade = $especialidade;
  }

  static public function getFilename()
  {
    return 'dentistas.txt';
  }

  public function setCro(string $cro)
  {
    $this->cro = $cro;
  }

  public function getCro(): string
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
