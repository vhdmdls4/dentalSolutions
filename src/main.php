<?php

require_once('../global.php');

// Criação das classes

$end = new Endereco("Antonio Carlos", "Sao Luiz", "12312123", "Portaria 1", 123, "BH", "MG");

$auxiliar = new Auxiliar("Ramon", "31912341234", "aux@dentalsolutions.com.br", "12312312312", "123123", $end);

$cliente = new Cliente("Pedro", "31900000000", "cliente@gmail.com", "11111111111", "MG11111111");

/*
$consulta = new Consulta();

$dentista = new Dentista("21212121", "limpeza dentaria", "DENTISTAPAI", "31922222222", "dentistaABSTRATO@dentalsolutions.com.br",   );

$dent_func = new dentistaFuncionario();

$dent_parceiro = new dentistaParceiro();

$func = new Funcionario();

$orcamento = new Orcamento();

$paciente = new Paciente();

$pagamento = new Pagamento ();

$procedimento = new Procedimentos();

$profissional = new Profissional();

$secretario = new Secretario("Henrique", "31999999999", "secrt@dentalsolutions.com.br", "32132132132", $end, 4321,43);

*/



//Teste do login de um único Usuario
$usuario = new Usuario("Henrique");

$usuario2 = new Usuario("Ramon");

$login = Login::getInstance();
$login->logar($usuario);

var_dump($login);

echo "  ||||||||||||||||||||||||||||||||||  "; //separador pra identificar melhor a impressao na tela de cada login

$login2 = Login::getInstance();
$login2->logar($usuario2);

var_dump($login2);

echo "||||||||||||||||||||||||||||||||||"; // ^^

if($login === $login2){ // se $login for EXATAMENTE igual a $login2 (isso inclui mesmo endereço)

    echo "São iguais!\n"; // se isso for impresso, o login unico funcionou 

}

$login2->deslogar();

var_dump($login); // necessário retornar Null, após $login2 ter sido deslogado

