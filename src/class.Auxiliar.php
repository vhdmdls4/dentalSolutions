<?php

require_once("class.Funcionario.php");

class Auxiliar extends Funcionario
{
    // Sem atributos especificos para a classe no Sprint 1.

    // Caso o construtor de Profissional receba o objeto Endereco como parametro.
    public function __construct
    (
        string $nome,
        string $telefone,
        string $email,
        string $cpf,
        Endereco $endereco,
        float $salario
    ) {
        parent::__construct($nome, $telefone, $email, $cpf, $endereco, $salario);
    }
    /* Caso o construtor de Profissional receba cada atributo do Endereco como parametro, em vez do objeto.
    public function __construct(
        string $nome,
        string $telefone,
        string $email,
        string $cpf,
        string $rua,
        string $bairro,
        string $cep,
        int $numero,
        string $complemento,
        string $cidade,
        string $estado,
        float $salario
    ) {
        parent::__construct(
            $nome,
            $telefone,
            $email,
            $cpf,
            $rua,
            $bairro,
            $cep,
            $numero,
            $complemento,
            $cidade,
            $estado,
            $salario
        );
    }*/
}

?>