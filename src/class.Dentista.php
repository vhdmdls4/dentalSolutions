<?php

abstract class Dentista extends Profissional
{
  protected string $cro;
  protected Agenda $agenda;
  protected array $habilitacoes = array();

  public function __construct(string $cro, string $nome, string $telefone, string $email, string $CPF, Endereco $endereco, Agenda $agenda)
  {
    parent::__construct($nome, $telefone, $email, $CPF, $endereco);
    $this->cro = $cro;
    $this->agenda = $agenda;
  }

  abstract static public function getFilename();

  public function setCro(string $cro)
  {
    $this->cro = $cro;
  }

  public function getCro(): string
  {
    return $this->cro;
  }

  public function setAgenda(Agenda $agenda)
  {
    $this->agenda = $agenda;
  }

  public function getAgenda(): Agenda
  {
    return $this->agenda;
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
