<?php

require_once("class.Pessoa.php");
require_once("class.Cliente.php");

class Paciente extends Pessoa
{
  private DateTime $dataNascimento;
  private Cliente $responsavelFinanceiro;
  private array $tratamentos;

  public function __construct($nome, $telefone, $email, $CPF, $dataNascimento, Cliente $responsavelFinanceiro)
  {
    parent::__construct($nome, $telefone, $email, $CPF);
    $this->dataNascimento = new DateTime($dataNascimento);
    $this->responsavelFinanceiro = $responsavelFinanceiro;
  }

  public function getDataNascimento(): DateTime
  {
    return $this->dataNascimento;
  }

  public function setDataNascimento(DateTime $dataNascimento)
  {
    $this->dataNascimento = $dataNascimento;
  }

  public function getResponsavelFinanceiro(): CLiente
  {
    return $this->responsavelFinanceiro;
  }

  public function setResponsavelFinanceiro(Cliente $responsavelFinanceiro)
  {
    $this->responsavelFinanceiro = $responsavelFinanceiro;
  }

  public function getTratamentos(): array
  {
    return $this->tratamentos;
  }

  public function adicionarTratamento($tratamento)
  {
    $this->tratamentos[] = $tratamento;
  }

  public function removerTratamento($indice)
  {
    if (isset($this->tratamentos[$indice])) {
      unset($this->tratamentos[$indice]);
    }
  }
}