<?php

class Funcionalidade
{

  protected string $nome;

  public function __construct(string $nome)
  {
    $this->nome = $nome;
  }

  public function getNome(): string
  {
    return $this->nome;
  }

  public function setNomePerfil(string $nome)
  {
    $this->nome = $nome;
  }
}

//criacao de funcionalidades padrao
$cadastrar_orcamento = new Funcionalidade("Cadastrar orcamento");
$excluir_orcamento = new Funcionalidade("Excluir orcamento");
$alterar_orcamento = new Funcionalidade("Alterar orcamento");

$cadastrar_usuario = new Funcionalidade("Cadastrar usuario");
$excluir_usuario = new Funcionalidade("Excluir usuario");
$alterar_usuario = new Funcionalidade("Alterar usuario");

$cadastrar_procedimento = new Funcionalidade("Cadastrar procedimento");
$excluir_procedimento = new Funcionalidade("Excluir procedimento");
$alterar_procedimento = new Funcionalidade("Alterar procedimento");

$cadastrar_consulta = new Funcionalidade("Cadastrar consulta");
$excluir_consulta = new Funcionalidade("Excluir consulta");
$alterar_consulta = new Funcionalidade("Alterar consulta");

$cadastrar_cliente = new Funcionalidade("Cadastrar cliente");
$excluir_cliente = new Funcionalidade("Cadastrar cliente");
$alterar_cliente = new Funcionalidade("Alterar cliente");

$entrar = new Funcionalidade("Entrar no sistema"); //se o login do usuario estiver no sistema, fazer login com a classe Login
$sair = new Funcionalidade("Sair do sistema"); //usar funcao deslogar de Login

$criar_profissional = new Funcionalidade("Cadastrar profissional");
