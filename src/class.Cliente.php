<?php

require_once("class.Pessoa.php");
require_once("class.Paciente.php");


class Cliente extends Pessoa
{
    private string $rg;
    private array $pacientes = array();

    public function __construct(string $nome, string $telefone, string $email, string $cpf, string $rg)
    {
        parent::__construct($nome, $telefone, $email, $cpf);
        $this->rg = $rg;
    }

    public function getRg()
    {
        return $this->rg;
    }

    public function setRg(string $novoRg)
    {
        $this->rg = $novoRg;
    }

    public function getPacientes()
    {
        return $this->pacientes;
    }

    public function adicionaPaciente(Paciente $paciente)
    {
        $this->pacientes[$paciente->$nome] = $paciente;
    }

    public function removePaciente(string $nome)
    {
        unset($this->pacientes[$nome]);
    }
}

?>