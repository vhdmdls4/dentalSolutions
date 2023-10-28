<?php


require_once("class.Pessoa.php");
require_once("class.Dentista.php");

class dentistaParceiro extends Dentista
{
  public function __construct($cro, $especialidade, $nome, $telefone, $email, $CPF, $endereco, $comissao)
  {
    parent::__construct($cro, $especialidade, $nome, $telefone, $email, $CPF, $endereco);
  }

  //ver se é necessário
  // static public function getFilename()
  // {
  //   return 'dentistas.txt';
  // }

  public function getComissao(Especialidade $especialidade): float
  {
    $habilitacao = $this->habilitacoes[$especialidade->getNome()] ?? null;
    return $habilitacao ? $habilitacao->getComissao() : 0.0;
  }

  public function exibirPessoa()
  {

    $cpfFormatado = substr($this->CPF, 0, 3) . '.' . substr($this->CPF, 3, 3) . '.' . substr($this->CPF, 6, 3) . '-' . substr($this->CPF, 9, 2);

    echo "Nome: " . $this->nome . "\n";
    echo "Telefone: " . $this->telefone . "\n";
    echo "CPF: " . $cpfFormatado . "\n";
    echo "e-mail: " . $this->email . "\n";
    echo "Cro: " . $this->cro . "\n";
    echo "Especialidades: " . $this->getEspecialidades() . "\n";
  }
}
