<?php
require_once("persist.php");

class Endereco extends persist
{
    private $rua;
    private $bairro;
    private $cep;
    private $complemento;
    private $numero;
    private $cidade;
    private $estado;

    public function __construct($rua, $bairro, $cep, $complemento, $numero, $cidade, $estado)
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
        return 'enderecos.txt';
    }

    public function getRua()
    {
        return $this->rua;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function getEstado()
    {
        return $this->estado;
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
        $this->numero = trim(fgets(STDIN));

        echo "Cidade: ";
        $this->cidade = trim(fgets(STDIN));

        echo "Estado: ";
        $this->estado = trim(fgets(STDIN));
    }
}
