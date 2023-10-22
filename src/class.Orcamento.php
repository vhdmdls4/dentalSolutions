<?php

require_once("class.Procedimentos.php");

class Orcamento extends persist
{
    private string $id;
    private Paciente $paciente;
    private Dentista $dentistaResponsavel;
    private DateTime $dataOrcamento;
    private array $procedimentos = array();
    private float $valorTotal = 0;
    private bool $tratamentoAprovado = false;
    private Pagamento $pagamento;
    private string $descricao;
    private array $consultas = array();

    public function __construct(string $id, Paciente $paciente, Dentista $dentistaResponsavel, DateTime $dataOrcamento, array $procedimentos, float $valorTotal, Pagamento $pagamento, string $descricao, array $consultas)
    {
        $this->id = $id;
        $this->paciente = $paciente;
        $this->dentistaResponsavel = $dentistaResponsavel;
        $this->dataOrcamento = $dataOrcamento;
        $this->procedimentos = $procedimentos;
        $this->valorTotal = $valorTotal;
        $this->pagamento = $pagamento;
        $this->descricao = $descricao;
        $this->consultas = $consultas;
    }

    static public function getFilename()
    {
        return 'orcamentos.txt';
    }

    public function aprovaTratamento(Pagamento $pagamento)
    {
        $this->tratamentoAprovado = true;
        $this->pagamento = $pagamento;
    }

    public function addProcedimento(Procedimentos $procedimento)
    {
        $this->valorTotal += ($procedimento->getValorUnitario());
        array_push($this->procedimentos, $procedimento);
    }

    public function delProcedimento(Procedimentos $procedimento)
    {
        $key = array_search($procedimento, $this->procedimentos);
        if ($key === false) {
            return;
        }
        $this->valorTotal -= $procedimento->getValorUnitario();
        unset($this->procedimentos[$key]);
    }

    public function valorParcelas(): float
    {
        return $this->valorTotal / $this->pagamento->getParcelas();
    }

    public function getId(): string
    {
        return $this->id;
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

    public function getProcedimentos(): array
    {
        return $this->procedimentos;
    }

    public function getPagamento(): Pagamento
    {
        return $this->pagamento;
    }

    public function setPagamento(Pagamento $pagamento)
    {
        $this->pagamento = $pagamento;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
    }

    public function getConsultas(): array
    {
        return $this->consultas;
    }

    public function addConsulta(Consulta $consulta)
    {
        array_push($this->consultas, $consulta);
    }

    public function delConsulta(Consulta $consulta)
    {
        $key = array_search($consulta, $this->consultas);
        if ($key === false) {
            return;
        }
        unset($this->consultas[$key]);
    }
}
