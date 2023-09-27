<?php

class Procedimentos {
    protected $procedimento;
    protected $descricao;
    protected $valorUnitario;
    protected $tempoEstimado;

    public function __construct($procedimento, $descricao, $valorUnitario, $tempoEstimado) {
        $this->procedimento = $procedimento;
        $this->descricao = $descricao;
        $this->valorUnitario = $valorUnitario;
        $this->tempoEstimado = $tempoEstimado;
    }

    public function cadastrarProcedimento(){
        echo "Procedimento: ";
        $this->procedimento = trim(fgets(STDIN));

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

    public function salvarProcedimento($filename){
        $data = "Procedimento: " . $this->procedimento . "\n";
        $data .= "Descrição: " . $this->descricao . "\n";
        $data .= "Valor Unitário: " . $this->valorUnitario . "\n";
        $data .= "Tempo Estimado: " . $this->tempoEstimado . "\n";
        $data .= "\n";

        $file = fopen($filename, "a"); 
        if  ($file === false) {
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

    public function exibeProcedimentos(){
        echo "Procedimento: " . $this->procedimento . "\n";
        echo "Descrição: " . $this->descricao . "\n";
        echo "Valor Unitário: R$" . $this->valorUnitario . "\n";
        echo "Tempo Estimado: " . $this->tempoEstimado . "min.\n";
    }
}

?>
