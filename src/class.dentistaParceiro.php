<?php

require_once ("class.Pessoa.php");
require_once ("class.Profissional.php");

class dentistaParceiro extends Profissional {
  private $cro;
  private $especialidade;
  private $comissao;
  
  public function __construct ($cro, $especialidade, $comissao, $nome, $telefone, $email, $CPF) {
    $this-> cro = $cro;
    $this-> especialidade = $especialidade;
    $this-> comissao = $comissao;
    $this->nome = $nome;
    $this->telefone = $telefone;
    $this->email = $email;
    $this->CPF = $CPF;
  }
  
  
  public function getCro() {
    return $this-> cro;
  }

  public function setCro($cro) {
    $this-> cro = $cro;
  }
  
  public function getEspecialidade() {
    return $this-> especialidade;
  }

  public function setEspecialidade($especialidade) {
    $this-> especialidade = $especialidade;
  }

  public function getComissao() {
    return $this-> comissao;
  }

  public function setComissao($comissao) {
    $this-> comissao = $comissao;
  }

  public function exibirPessoa() {
    
    $cpfFormatado = substr($this-> CPF, 0, 3) . '.' . substr($this-> CPF, 3, 3) . '.' . substr($this-> CPF, 6, 3) . '-' . substr($this-> CPF, 9, 2);

    echo "Nome: " . $this-> nome . "\n";
    echo "Telefone: " . $this-> telefone . "\n";
    echo "CPF: " . $cpfFormatado . "\n";
    echo "e-mail: " . $this-> email . "\n";
    echo "Cro: " . $this-> cro . "\n";
    echo "Especialidade: " . $this-> especialidade . "\n";
    echo "Comissao: " . $this-> comissao . "\n";
    }
}    

?>
