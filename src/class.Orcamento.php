<?php
    class Orcamento{
        private Paciente $paciente;
        private Dentista $dentistaResponsavel;
        private DateTime $dataOrcamento;
        private $procedimentos = array();
        private float $valorTotal = 0;
        private bool $tratamentoAprovado = false;

        public function __construct(Paciente $p_paciente, Dentista $p_dentistaResponsavel, DateTime $p_dataOrcamento)
        {
            $this->$paciente = $p_paciente;
            $this->$dentistaResponsavel = $p_dentistaResponsavel;
            $this->$dataOrcamento = $p_dataOrcamento;

        }

        public function changeTratamentoAprovado()
        {
            $this->$tratamentoAprovado = true;
        }

        public function addProcedimentos(Procedimentos $p_procedimentos, int $n_vezes)
        {
            $this->$valorTotal = $valorTotal + ($p_procedimentos->getValorUnitario * $n_vezes)    
            for ($i = 1; ; $i++) {
                if ($i > $n_vezes) {
                    break;
                }
                array_push($this->$procedimentos, $p_procedimentos);
            }
        }
        
        public function getValorTotal()
        {
            return $this->$valorTotal;
        }

        public function getPaciente()
        {
            return $this->$paciente;
        }
        public function getDentistaResponsavel()
        {
            return $this->$dentistaResponsavel;
        }
        public function getDataOrcamento()
        {
            return $this->$dataOrcamento;
        }
        public function getTratamentoAprovado()
        {
            return $this->$tratamentoAprovado;
        }

        public function getProcedimentos()
        {
            return $this->$procedimentos;
        }
    }
