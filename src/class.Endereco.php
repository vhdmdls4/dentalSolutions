<?php

class Endereco extends persist
{
    protected string $rua;
    protected string $bairro;
    protected string $cep;
    protected string $complemento;
    protected int $numero;
    protected string $cidade;
    protected string $estado;

    public function __construct(string $rua, string $bairro, string $cep, string $complemento, int $numero, string $cidade, string $estado)
    {
        $this->rua = $rua;
        $this->bairro = $bairro;
        $this->cep = $cep;
        $this->complemento = $complemento;
        $this->numero = $numero;
        $this->cidade = $cidade;
        $this->estado = $estado;
    }

    static public function getFilename()
    {
        return 'Endereco.txt';
    }

    public function getRua(): string
    {
        return $this->rua;
    }

    public function getBairro(): string
    {
        return $this->bairro;
    }

    public function getCep(): string
    {
        return $this->cep;
    }

    public function getComplemento(): string
    {
        return $this->complemento;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getCidade(): string
    {
        return $this->cidade;
    }

    public function getEstado(): string
    {
        return $this->estado;
    }

    public function setRua(string $rua)
    {
        $this->rua = $rua;
    }

    public function setBairro(string $bairro)
    {
        $this->bairro = $bairro;
    }

    public function setCep(string $cep)
    {
        $this->cep = $cep;
    }

    public function setComplemento(string $complemento)
    {
        $this->complemento = $complemento;
    }

    public function setNumero(int $numero)
    {
        $this->numero = $numero;
    }

    public function setCidade(string $cidade)
    {
        $this->cidade = $cidade;
    }

    public function setEstado(string $estado)
    {
        $this->estado = $estado;
    }

    public function cadastrarEndereco()
    {
        echo "Informe os dados do endereço:\n";
        echo "Rua: ";
        $this->rua = trim(fgets(STDIN));

        echo "Bairro: ";
        $this->bairro = trim(fgets(STDIN));

        echo "CEP: ";
        $this->cep = trim(fgets(STDIN));

        echo "Complemento: ";
        $this->complemento = trim(fgets(STDIN));

        echo "Número: ";
        $this->numero = intval(trim(fgets(STDIN)));

        echo "Cidade: ";
        $this->cidade = trim(fgets(STDIN));

        echo "Estado: ";
        $this->estado = trim(fgets(STDIN));
    }
}
