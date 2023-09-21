<?php

class Procedimentos {
    protected $procedimento;
    protected $descricao;
    protected $valorUnitario;

    public function __construct($procedimento, $descricao, $valorUnitario) {
        $this->procedimento = $procedimento;
        $this->descricao = $descricao;
        $this->valorUnitario = $valorUnitario;
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
    }

    public function salvarProcedimento($filename){
        $data = "Procedimento: " . $this->procedimento . "\n";
        $data .= "Descrição: " . $this->descricao . "\n";
        $data .= "Valor Unitário: " . $this->valorUnitario . "\n";
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
        echo "Valor Unitário: " . $this->valorUnitario . "\n";
    }
}

?>