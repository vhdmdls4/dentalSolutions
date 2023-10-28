<?php


require_once("class.Pessoa.php");
require_once("class.Dentista.php");

class dentistaFuncionario extends Dentista
{
  protected float $salario;

  public function __construct($cro, $nome, $telefone, $email, $CPF, $endereco, $salario)
  {
    parent::__construct($cro, $nome, $telefone, $email, $CPF, $endereco);
    $this->salario = $salario;
  }

  //ver se é necessário
  // static public function getFilename()
  // {
  //   return 'dentistas.txt';
  // }

  public function getSalario(): float
  {
    return $this->salario;
  }

  public function setSalario(float $salario)
  {
    $this->salario = $salario;
  }

  public function exibirPessoa()
  {

    $cpfFormatado = substr($this->CPF, 0, 3) . '.' . substr($this->CPF, 3, 3) . '.' . substr($this->CPF, 6, 3) . '-' . substr($this->CPF, 9, 2);

    echo "Nome: " . $this->nome . "\n";
    echo "Telefone: " . $this->telefone . "\n";
    echo "CPF: " . $cpfFormatado . "\n";
    echo "e-mail: " . $this->email . "\n";
    echo "Cro: " . $this->cro . "\n";
    echo "Habilitacoes: " . $this->habilitacoes . "\n";
    echo "Salario: " . $this->salario . "\n";
  }
}
