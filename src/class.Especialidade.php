<?php

class Especialidade extends persist
{
    private string $nome;

    public function __construct(string $nome)
    {
        $this->nome = $nome;
    }


    static public function getFilename()
    {
        return 'especialidades.txt';
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }
}
