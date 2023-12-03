<?php

class Procedimento extends persist
{
    protected string $nome;
    protected string $descricao;
    protected float $valorUnitario;
    protected Especialidade $especialidade;

    public function __construct(string $nome, string $descricao, float $valorUnitario, Especialidade $especialidade)
    {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->valorUnitario = $valorUnitario;
        $this->especialidade = $especialidade;
    }

    static public function getFilename()
    {
        return 'Procedimento.txt';
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
    }

    public function getValorUnitario(): float
    {
        return $this->valorUnitario;
    }

    public function setValorUnitario(float $valorUnitario)
    {
        $this->valorUnitario = $valorUnitario;
    }

    public function getEspecialidade(): Especialidade
    {
        return $this->especialidade;
    }
    public function setEspecialidade(Especialidade $especialidade)
    {
        $this->especialidade = $especialidade;
    }

    public function cadastrarProcedimento()
    {
        echo "Procedimento: ";
        $this->nome = trim(fgets(STDIN));

        echo "Descrição: ";
        $this->descricao = trim(fgets(STDIN));

        while (true) {
            echo "Valor Unitário: ";
            $valorUnitario = trim(fgets(STDIN));

            if (is_numeric($valorUnitario)) {
                $this->valorUnitario = $valorUnitario;
                break;
            } else {
                echo "Por favor, insira apenas números para o valor unitário.\n";
            }
        }
    }

    public function salvarProcedimento($filename)
    {
        $data = "Procedimento: " . $this->nome . "\n";
        $data .= "Descrição: " . $this->descricao . "\n";
        $data .= "Valor Unitário: " . $this->valorUnitario . "\n";
        $data .= "\n";

        $file = fopen($filename, "a");
        if ($file === false) {
            echo "Não foi possível abrir o arquivo";
            return;
        }

        if (fwrite($file, $data) === false) {
            echo "Não foi possível escrever no arquivo";
        } else {
            echo "Procedimento cadastrado com sucesso!";
        }

        fclose($file);
    }

    public function exibeProcedimentos()
    {
        echo "Procedimento: " . $this->nome . "\n";
        echo "Descrição: " . $this->descricao . "\n";
        echo "Valor Unitário: R$" . $this->valorUnitario . "\n";
    }
}
