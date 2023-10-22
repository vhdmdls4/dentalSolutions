<?php

require_once("class.Pessoa.php");
require_once("class.Cliente.php");

class Paciente extends Pessoa
{
  private DateTime $dataNascimento;
  private Cliente $responsavelFinanceiro;
  private array $tratamentos = array();
  private string $rg;

  public function __construct($nome, $telefone, $email, $CPF, $dataNascimento, Cliente $responsavelFinanceiro, string $rg)
  {
    parent::__construct($nome, $telefone, $email, $CPF);
    $this->dataNascimento = new DateTime($dataNascimento);
    $this->responsavelFinanceiro = $responsavelFinanceiro;
    $this->rg = $rg;
  }

  public function getDataNascimento(): DateTime
  {
    return $this->dataNascimento;
  }

  public function setDataNascimento(DateTime $dataNascimento)
  {
    $this->dataNascimento = $dataNascimento;
  }

  public function getResponsavelFinanceiro(): Cliente
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

  public function getRg(): string
  {
    return $this->rg;
  }

  public function setRg(string $rg)
  {
    $this->rg = $rg;
  }

  public function addOrcamento(Orcamento $orcamento)
  {
    $this->tratamentos[$orcamento->getId()] = $orcamento;
  }

  public function aprovaOrcamento(string $id, FormaPagamento $forma)
  {
    $this->tratamentos[$id]->aprovaTratamento($forma);
  }

  public function delOrcamento(string $id)
  {
    if (isset($this->tratamentos[$id])) {
      unset($this->tratamentos[$id]);
    }
  }
}
