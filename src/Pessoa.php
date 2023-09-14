<?php

class Pessoa {
    private $nome;
    private $telefone;
    private $email;
    private $CPF;

    public function __construct($nome, $telefone, $email, $CPF) {
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->CPF = $CPF;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getCPF() {
        return $this->CPF;
    }

    public function setCPF($CPF) {
        $this->CPF = $CPF;
    }

    public function cadastrarPessoa() {
        echo "Nome: ";
        $this->nome = trim(fgets(STDIN));
        
        while (true) {
            echo "Telefone (apenas números): ";
            $telefone = trim(fgets(STDIN));
            
            if (is_numeric($telefone)) {
                $this->telefone = $telefone;
                break; // Sai do loop se a entrada for um número válido
            } else {
                echo "Por favor, insira apenas números para o telefone.\n";
            }
        }
        
        while (true) {
            echo "CPF (apenas números): ";
            $CPF = trim(fgets(STDIN));
            
            if (is_numeric($CPF)) {
                $this->CPF = $CPF;
                break; // Sai do loop se a entrada for um número válido
            } else {
                echo "Por favor, insira apenas números para o CPF.\n";
            }
        }
        
        echo "e-mail: ";
        $this->email = trim(fgets(STDIN));
    }    

    public function exibirPessoa() {
        echo "Nome: " . $this->nome . "\n";
        echo "CPF: " . $this->CPF . "\n";
        echo "Telefone: " . $this->telefone . "\n";
        echo "e-mail: " . $this->email . "\n";
    }

}

?>