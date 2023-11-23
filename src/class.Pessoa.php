<?php

require_once('persist.php');
abstract class Pessoa extends persist
{
    protected string $nome;
    protected string $telefone;
    protected string $email;
    protected string $CPF;

    public function __construct(string $nome, string $telefone, string $email, string $CPF)
    {
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->CPF = $CPF;
    }

    abstract static public function getFilename();

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone)
    {
        $this->telefone = $telefone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getCPF(): string
    {
        return $this->CPF;
    }

    public function setCPF(string $CPF)
    {
        $this->CPF = $CPF;
    }

    public function validaCPF(string $CPF): bool
    {

        $CPF = preg_replace('/[^0-9]/is', '', $CPF);

        if (strlen($CPF) != 11) {
            return false;
        }

        if (preg_match('/(\d)\1{10}/', $CPF)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $CPF[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($CPF[$c] != $d) {
                return false;
            }
        }
        return true;
    }

    public function cadastrarPessoa()
    {
        echo "Nome: ";
        $this->nome = trim(fgets(STDIN));

        while (true) {
            echo "Telefone (apenas números): ";
            $telefone = trim(fgets(STDIN));

            if (is_numeric($telefone)) {
                $this->telefone = $telefone;
                break;
            } else {
                echo "Por favor, insira apenas números para o telefone.\n";
            }
        }

        while (true) {
            echo "CPF (apenas números): ";
            $CPF = trim(fgets(STDIN));

            if ($this->validaCPF($CPF)) {
                $this->CPF = $CPF;
                break;
            } else {
                echo "CPF inválido.\n";
            }
        }

        echo "e-mail: ";
        $this->email = trim(fgets(STDIN));
    }

    public function exibirPessoa()
    {
        $cpfFormatado = substr($this->CPF, 0, 3) . '.' . substr($this->CPF, 3, 3) . '.' . substr($this->CPF, 6, 3) . '-' . substr($this->CPF, 9, 2);

        echo "Nome: " . $this->nome . "\n";
        echo "Telefone: " . $this->telefone . "\n";
        echo "CPF: " . $cpfFormatado . "\n";
        echo "e-mail: " . $this->email . "\n";
    }

    public function salvarPessoa($filename)
    {
        $data = "Nome: " . $this->nome . "\n";
        $data .= "Telefone: " . $this->telefone . "\n";
        $data .= "CPF: " . $this->CPF . "\n";
        $data .= "E-mail: " . $this->email . "\n";
        $data .= "\n";

        $file = fopen($filename, "a");
        if ($file === false) {
            echo "Erro ao abrir o arquivo para escrita.";
            return;
        }

        if (fwrite($file, $data) === false) {
            echo "Erro ao escrever no arquivo.";
        } else {
            echo "Cadastro concluído com sucesso.\n";
        }

        fclose($file);
    }
}
