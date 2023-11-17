<?php

class Cliente extends Pessoa
{
    private string $rg;
    private array $pacientes = array();

    public function __construct(string $nome, string $telefone, string $email, string $cpf, string $rg)
    {
        parent::__construct($nome, $telefone, $email, $cpf);
        $this->rg = $rg;
    }

    static public function getFilename()
    {
        return 'clientes.txt';
    }

    public function getRg(): string
    {
        return $this->rg;
    }

    public function setRg(string $novoRg)
    {
        $this->rg = $novoRg;
    }

    public function getPacientes(): array
    {
        return $this->pacientes;
    }

    public function adicionaPaciente(Paciente $paciente)
    {
        $this->pacientes[$paciente->getNome()] = $paciente;
    }

    public function removePaciente(string $nome)
    {
        unset($this->pacientes[$nome]);
    }
}
