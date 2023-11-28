<?php

require_once 'class.Pessoa.php';

class Cliente extends Pessoa
{
    private string $rg;
    private array $pacientes = array();

    public function __construct(string $nome, string $telefone, string $email, string $cpf, string $rg)
    {
        $todosClientes = $this->getRecords();

        foreach ($todosClientes as $clienteExistente) {
            if ($clienteExistente->getEmail() === $email) {
                throw new Exception("Já existe um cliente cadastrado com este email.");
            }

            if ($clienteExistente->getCpf() === $cpf) {
                throw new Exception("Já existe um cliente cadastrado com este CPF.");
            }

            if ($clienteExistente->getRg() === $rg) {
                throw new Exception("Já existe um cliente cadastrado com este RG.");
            }
        }

        parent::__construct($nome, $telefone, $email, $cpf);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Formato de email inválido");
        }

        if (!$this->validaCpf($cpf)) {
            throw new Exception("CPF Inválido");
        }

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
