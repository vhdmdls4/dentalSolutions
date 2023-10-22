<?php

class Funcionalidades {

    protected string $nome;
    protected string $descricao;

    public function __construct(string $nome, string $descricao)
  {
    $this->nome = $nome;
    $this->descricao = $descricao;
  }

  public function getNome(): string
    {
        return $this-> nome;
    } 

    public function setNomePerfil(int $nome)
    {
        $this->nome = $nome;
    }


    public function getDescricao(): string
    {
        return $this-> descricao;
    } 

    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
    }
}


?>