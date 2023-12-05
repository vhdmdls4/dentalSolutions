<?php

require_once 'global.php';

class Funcionalidade extends persist
{

  static public function getFilename()
  {
    return 'funcionalidades.txt';
  }

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

$cadastrar_orcamento = new Funcionalidade("Cadastrar orcamento");
$cadastrar_orcamento->save();
$alterar_orcamento = new Funcionalidade("Alterar orcamento");
$alterar_orcamento->save();

$cadastrar_usuario = new Funcionalidade("Cadastrar usuario");
$cadastrar_usuario->save();
$alterar_usuario = new Funcionalidade("Alterar usuario");
$alterar_usuario->save();

$cadastrar_procedimento = new Funcionalidade("Cadastrar procedimento");
$cadastrar_procedimento->save();
$alterar_procedimento = new Funcionalidade("Alterar procedimento");
$alterar_procedimento->save();

$cadastrar_consulta = new Funcionalidade("Cadastrar consulta");
$cadastrar_consulta->save();
$alterar_consulta = new Funcionalidade("Alterar consulta");
$alterar_consulta->save();

$cadastrar_cliente = new Funcionalidade("Cadastrar cliente");
$cadastrar_cliente->save();
$alterar_cliente = new Funcionalidade("Alterar cliente");
$alterar_cliente->save();


$cadastrar_paciente = new Funcionalidade("Cadastrar paciente");
$cadastrar_paciente->save();

$alterar_paciente = new Funcionalidade("Alterar paciente");
$alterar_paciente->save();

$cadastrar_especialidade = new Funcionalidade("Cadastrar especialidade");
$cadastrar_especialidade->save();
$alterar_especialidade = new Funcionalidade("Alterar especialidade");
$alterar_especialidade->save();

$cadastrar_profissional = new Funcionalidade("Cadastrar profissional");
$cadastrar_profissional->save();

$alterar_profissional = new Funcionalidade("Alterar profissional");
$alterar_profissional->save();

$cadastrar_funcionario = new Funcionalidade("Cadastrar funcionario");
$cadastrar_funcionario->save();
$alterar_funcionario = new Funcionalidade("Alterar funcionario");
$alterar_funcionario->save();

$entrar = new Funcionalidade("Entrar no sistema");
$sair = new Funcionalidade("Sair do sistema");
