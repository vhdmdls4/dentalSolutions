<?php

class Procedimentos extends persist
{
    private string $nome;
    private string $descricao;
    private float $valorUnitario;
    private int $tempoEstimado;
    private Especialidade $especialidade;

    public function __construct(string $procedimento, string $descricao, float $valorUnitario, int $tempoEstimado, Especialidade $especialidade)
    {
        $this->nome = $procedimento;
        $this->descricao = $descricao;
        $this->valorUnitario = $valorUnitario;
        $this->tempoEstimado = $tempoEstimado;
        $this->especialidade = $especialidade;
    }

    static public function getFilename()
    {
        return 'procedimentos.txt';
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome(string $procedimento)
    {
        $this->nome = $procedimento;
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

    public function getTempoEstimado(): int
    {
        return $this->tempoEstimado;
    }

    public function setTempoEstimado(int $tempoEstimado)
    {
        $this->tempoEstimado = $tempoEstimado;
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

        while (true) {
            echo "Tempo Estimado (em minutos): ";
            $tempoEstimado = trim(fgets(STDIN));

            if (is_numeric($tempoEstimado)) {
                $this->tempoEstimado = $tempoEstimado;
                break;
            } else {
                echo "Por favor, insira apenas números para o tempo estimado.\n";
            }
        }
    }

    public function salvarProcedimento($filename)
    {
        $data = "Procedimento: " . $this->nome . "\n";
        $data .= "Descrição: " . $this->descricao . "\n";
        $data .= "Valor Unitário: " . $this->valorUnitario . "\n";
        $data .= "Tempo Estimado: " . $this->tempoEstimado . "\n";
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
        echo "Tempo Estimado: " . $this->tempoEstimado . "min.\n";
    }
}
