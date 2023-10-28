<?php

require_once("class.Profissional.php");

class Dentista extends Profissional
{
  protected string $cro;
  protected array $habilitacoes = array();

  public function __construct(string $cro, string $nome, string $telefone, string $email, string $CPF, Endereco $endereco)
  {
    parent::__construct($nome, $telefone, $email, $CPF, $endereco);
    $this->cro = $cro;
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

  public function getHabilitacoes(): array
  {
    return $this->habilitacoes;
  }
  public function addHabilitacao(Habilitacao $habilitacao)
  {
    $this->habilitacoes[$habilitacao->getEspecialidade()->getNome()] = $habilitacao;
  }
  public function removeHabilitacao(Especialidade $especialidade)
  {
    unset($this->habilitacoes[$especialidade->getNome()]);
  }
  public function getEspecialidades(): array
  {
    $especialidades = array();
    foreach ($this->habilitacoes as $habilitacao) {
      $especialidades[] = $habilitacao->getEspecialidade();
    }
    unset($habilitacao);
    return $especialidades;
  }
}
