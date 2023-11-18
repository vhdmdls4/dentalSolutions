<?php

class Secretario extends Funcionario
{
    public function __construct(float $salario, string $nome, string $telefone, string $email, string $CPF, Endereco $endereco)
    {
        parent::__construct($salario, $nome, $telefone, $email, $CPF, $endereco);
    }

    static public function getFilename()
    {
        return 'Secretario.txt';
    }
}
