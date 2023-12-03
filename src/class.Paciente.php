<?php

require_once 'class.Pessoa.php';

class Paciente extends Pessoa
{
  protected DateTime $dataNascimento;
  protected Cliente $responsavelFinanceiro;
  protected array $tratamentos = array();
  protected string $rg;

  static public function getFilename()
  {
    return 'Paciente.txt';
  }

  public function __construct(string $nome, string $telefone, string $email, string $CPF, string $dataNascimento, Cliente $responsavelFinanceiro, string $rg)
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
    array_push($this->tratamentos, $orcamento);
  }

  public function aprovaOrcamento(Orcamento $orcamento, Pagamento $pagamento)
  {
    foreach ($this->tratamentos as $tratamento) {
      if ($tratamento === $orcamento) {
        $tratamento->aprovaTratamento($pagamento);
      }
    }
  }

  public function delOrcamento(Orcamento $orcamento)
  {
    foreach ($this->tratamentos as $tratamento) {
      if ($tratamento === $orcamento) {
        unset($tratamento);
      }
    }
  }
}
