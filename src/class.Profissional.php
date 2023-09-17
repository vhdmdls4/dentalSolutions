<?php

require_once ("class.Pessoa.php");
require_once ("class.Endereco.php");

  
abstract class Profissional extends Pessoa 
{

  public function __construct ($nome, $telefone, $email, $CPF, Endereco $endereco) {}
 
  public function exibeEndereco(){
    echo "Rua: " . $this-> rua . "\n";
    echo "Bairro: " . $this-> bairro . "\n";
    echo "CEP: " . $this-> cep . "\n";
    echo "Complemento: " . $this-> complemento . "\n";
    echo "Numero: " . $this-> numero . "\n";
    echo "Cidade: " . $this-> cidade . "\n";
    echo "Estado: " . $this-> estado . "\n";
  }


}
 

?>
