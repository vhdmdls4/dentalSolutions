<?php

abstract class Profissional extends Pessoa
{
  private Endereco $endereco;

  public function __construct(string $nome, string $telefone, string $email, string $CPF, Endereco $endereco)
  {
    parent::__construct($nome, $telefone, $email, $CPF);
    $this->endereco = $endereco;
  }

  public function exibeEndereco()
  {
    echo "Rua: " . $this->endereco->getRua() . "\n";
    echo "Bairro: " . $this->endereco->getBairro() . "\n";
    echo "CEP: " . $this->endereco->getCep() . "\n";
    echo "Complemento: " . $this->endereco->getComplemento() . "\n";
    echo "Numero: " . $this->endereco->getNumero() . "\n";
    echo "Cidade: " . $this->endereco->getCidade() . "\n";
    echo "Estado: " . $this->endereco->getEstado() . "\n";
  }
}
