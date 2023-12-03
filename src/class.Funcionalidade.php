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
$alterar_orcamento = new Funcionalidade("Alterar orcamento");

$cadastrar_usuario = new Funcionalidade("Cadastrar usuario");
$alterar_usuario = new Funcionalidade("Alterar usuario");

$cadastrar_procedimento = new Funcionalidade("Cadastrar procedimento");
$alterar_procedimento = new Funcionalidade("Alterar procedimento");

$cadastrar_consulta = new Funcionalidade("Cadastrar consulta");
$alterar_consulta = new Funcionalidade("Alterar consulta");

$cadastrar_cliente = new Funcionalidade("Cadastrar cliente");
$alterar_cliente = new Funcionalidade("Alterar cliente");

$cadastrar_paciente = new Funcionalidade("Cadastrar paciente");
$alterar_paciente = new Funcionalidade("Alterar paciente");

$cadastrar_especialidade = new Funcionalidade("Cadastrar especialidade");
$alterar_especialidade = new Funcionalidade("Alterar especialidade");

$cadastrar_profissional = new Funcionalidade("Cadastrar profissional");
$alterar_profissional = new Funcionalidade("Alterar profissional");

$cadastrar_funcionario = new Funcionalidade("Cadastrar funcionario");
$alterar_funcionario = new Funcionalidade("Alterar funcionario");

$entrar = new Funcionalidade("Entrar no sistema"); //se o login do usuario estiver no sistema, fazer login com a classe Login
$sair = new Funcionalidade("Sair do sistema"); //usar funcao deslogar de Login
