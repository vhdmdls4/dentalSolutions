<?php

require_once 'persist.php';
require_once 'class.Profissional.php';

class Orcamento extends persist
{
    protected Paciente $paciente;
    protected Dentista $dentistaResponsavel;
    protected DateTime $dataOrcamento;
    protected array $procedimentos = array();
    protected float $valorTotal = 0;
    protected bool $tratamentoAprovado = false;
    //protected Pagamento $pagamento;
    protected string $descricao;
    //protected array $consultas = array();

    public function __construct(
        Paciente $paciente,
        Dentista $dentistaResponsavel,
        DateTime $dataOrcamento,
        array $procedimentos, 
        //Pagamento $pagamento,
        string $descricao,
        //array $consultas
    ) {
        $this->paciente = $paciente;
        $this->dentistaResponsavel = $dentistaResponsavel;
        $this->dataOrcamento = $dataOrcamento;
        $this->procedimentos = $procedimentos;
        //$this->pagamento = $pagamento;
        $this->descricao = $descricao;
        //$this->consultas = $consultas;
    }

    // function __destruct()
    // {
    //     print "Destroying " . __CLASS__ . "\n";
    // }

    static public function getFilename()
    {
        return 'Orcamento.txt';
    }


    public function aprovaTratamento()
    {
        $this->tratamentoAprovado = true;
    }

    public function addProcedimento(Procedimento $procedimento, bool $realizado, DateTime $dataConclusão)
    {
        $procedimentoMap = [
            'realizado' => $realizado,
            'dataConclusão' => $dataConclusão,
            'procedimentoRealizado' => $procedimento,
        ];
        array_push($this->procedimentos, $procedimentoMap);
    }

    public function getProcedimentos(): array
    {
        $procedimentosData = [];
        foreach ($this->procedimentos as $procedimento) {
            $procedimentoData = [
                'realizado' => $procedimento['realizado'],
                'dataConclusao' => $procedimento['dataConclusao'],
                'procedimentoRealizado' => $procedimento['procedimentoRealizado'],
            ];
            $procedimentosData[] = $procedimentoData;
        }
        return $procedimentosData;
    }

    public function delProcedimento(Procedimento $procedimento)
    {
        foreach ($this->procedimentos as $key => $procedimentoMap) {
            if ($procedimentoMap['procedimentoRealizado'] === $procedimento) {
                unset($this->procedimentos[$key]);
                break;
            }
        }
    }

    public function calculaValorTotal(){
        $this->valorTotal = 0;
        foreach($this->procedimentos as $procedimento){
            $this->valorTotal += $procedimento->getValorTotal();
        }
    }

    public function getValorTotal(): float
    {
        return $this->valorTotal;
    }

    public function getPaciente(): Paciente
    {
        return $this->paciente;
    }

    public function getDentistaResponsavel(): Dentista
    {
        return $this->dentistaResponsavel;
    }

    public function getDataOrcamento(): DateTime
    {
        return $this->dataOrcamento;
    }

    public function getTratamentoAprovado(): bool
    {
        return $this->tratamentoAprovado;
    }
/*
    public function getPagamento(): Pagamento
    {
        return $this->pagamento;
    }

    public function setPagamento(Pagamento $pagamento)
    {
        $this->pagamento = $pagamento;
    }
*/
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
    }
}