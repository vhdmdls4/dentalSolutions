<?php

require_once("Pessoa.php");

/*//Criando objetos

$pessoa1 = new Pessoa("João da Silva", "123-456-7890", "joao@example.com", "123.456.789-00");
$pessoa2 = new Pessoa("Maria Souza", "987-654-3210", "maria@example.com", "987.654.321-00");

//Acessando os atributos

echo "Nome 1: " . $pessoa1->getNome() . "\n";
echo "Telefone 1: " . $pessoa1->getTelefone() . "\n";
echo "Email 1: " . $pessoa1->getEmail() . "\n";
echo "CPF 1: " . $pessoa1->getCpf() . "\n";

echo "\n";

echo "Nome 2: " . $pessoa2->getNome() . "\n";
echo "Telefone 2: " . $pessoa2->getTelefone() . "\n";
echo "Email 2: " . $pessoa2->getEmail() . "\n";
echo "CPF 2: " . $pessoa2->getCpf() . "\n";

//Alterando os atributos

$pessoa1->setTelefone("1234-5678");
$pessoa2->setEmail("novoemail@teste.com");

//Exibindo os atributos alterados

echo "\n";

echo "Novo telefone 1: " . $pessoa1->getTelefone() . "\n"; 

echo "Novo email 2: " . $pessoa2->getEmail() . "\n";

echo "\n";*/

// Crie um novo objeto Pessoa
$pessoa = new Pessoa("", "", "", ""); // Inicialize os valores vazios, eles serão preenchidos pelo método cadastrarPessoa

// Use o método cadastrarPessoa para preencher os dados da pessoa
$pessoa->cadastrarPessoa();

// Use o método exibirPessoa para exibir os dados da pessoa
echo "Informações do Usuário:\n";
$pessoa->exibirPessoa();

echo "\n";

?>