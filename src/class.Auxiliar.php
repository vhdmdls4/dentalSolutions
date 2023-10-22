<?php

require_once("class.Funcionario.php");

class Auxiliar extends Funcionario
{

    // Sem atributos especificos para a classe no Sprint 1.

    /* Codigo desnecessario por enquanto ja que a classe nao possui atributos proprios e herda o construtor do pai.
       Vou deixar para facilitar a cricao do construtor proprio futuramente.
    
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

    static public function getFilename()
    {
        return 'auxiliares.txt';
    }
    

    }*/
}
