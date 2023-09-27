<?php

class Orcamento
{
    private string $id;
    private Paciente $paciente;
    private Dentista $dentistaResponsavel;
    private DateTime $dataOrcamento;
    private array $procedimentos = array();
    private float $valorTotal = 0;
    private bool $tratamentoAprovado = false;
    private Pagamento $pagamento;

    public function __construct(string $id, Paciente $p_paciente, Dentista $p_dentistaResponsavel, DateTime $p_dataOrcamento)
    {
        $this->id = $id;
        $this->paciente = $p_paciente;
        $this->dentistaResponsavel = $p_dentistaResponsavel;
        $this->dataOrcamento = $p_dataOrcamento;
    }

    public function aprovaTratamento(Pagamento $pagamento)
    {
        $this->tratamentoAprovado = true;
        $this->pagamento = $pagamento;
    }

    public function addProcedimentos(Procedimentos $p_procedimentos, int $n_vezes)
    {
        $this->valorTotal = $this->valorTotal + ($p_procedimentos->getValorUnitario() * $n_vezes);
        array_push($this->procedimentos, $p_procedimentos);
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
}

<<<<<<< HEAD
?>
=======
?>
>>>>>>> 1707faaa7c34c7cfa2dc1a92493e4fd0df08f2b6
